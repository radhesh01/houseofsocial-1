<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{

    private $table      = 'bookings';
    private $slot_table = 'booking_slots';

    // ── SLOT TEMPLATES ────────────────────────────────────────────────

    public function get_all_slots()
    {
        return $this->db
            ->order_by('day_of_week', 'ASC')
            ->order_by('start_time', 'ASC')
            ->get($this->slot_table)
            ->result_array();
    }

    public function get_slots_by_day($day_of_week)
    {
        return $this->db
            ->where('day_of_week', (int)$day_of_week)
            ->where('is_available', 1)
            ->order_by('start_time', 'ASC')
            ->get($this->slot_table)
            ->result_array();
    }

    public function get_slot_by_id($id)
    {
        return $this->db->where('id', (int)$id)->get($this->slot_table)->row_array();
    }

    public function create_slot($data)
    {
        $insert = [
            'day_of_week'    => (int)$data['day_of_week'],
            'start_time'     => $this->db->escape_str($data['start_time']),
            'end_time'       => $this->db->escape_str($data['end_time']),
            'slot_duration'  => (int)($data['slot_duration'] ?? 30),
            'max_bookings'   => (int)($data['max_bookings'] ?? 1),
            'is_available'   => isset($data['is_available']) ? (int)$data['is_available'] : 1,
            'created_at'     => date('Y-m-d H:i:s'),
        ];
        $this->db->insert($this->slot_table, $insert);
        return $this->db->insert_id();
    }

    public function update_slot($id, $data)
    {
        return $this->db->where('id', (int)$id)->update($this->slot_table, [
            'day_of_week'   => (int)$data['day_of_week'],
            'start_time'    => $this->db->escape_str($data['start_time']),
            'end_time'      => $this->db->escape_str($data['end_time']),
            'slot_duration' => (int)($data['slot_duration'] ?? 30),
            'max_bookings'  => (int)($data['max_bookings'] ?? 1),
            'is_available'  => isset($data['is_available']) ? (int)$data['is_available'] : 1,
        ]);
    }

    public function delete_slot($id)
    {
        return $this->db->where('id', (int)$id)->delete($this->slot_table);
    }

    public function toggle_slot($id)
    {
        $slot = $this->get_slot_by_id($id);
        if (!$slot) return FALSE;
        return $this->db->where('id', (int)$id)->update($this->slot_table, [
            'is_available' => $slot['is_available'] == 1 ? 0 : 1,
        ]);
    }

    // ── AVAILABILITY ──────────────────────────────────────────────────

    /**
     * Returns time slots available for a given date (Y-m-d).
     * Subtracts already-booked (confirmed/pending) slots against max_bookings.
     */
    public function get_available_slots($date)
    {
        $timestamp   = strtotime($date);
        if (!$timestamp) return [];
        $day_of_week = (int)date('N', $timestamp); // 1=Mon … 7=Sun

        $template_slots = $this->get_slots_by_day($day_of_week);
        if (empty($template_slots)) return [];

        $available = [];
        foreach ($template_slots as $slot) {
            $booked_count = $this->_count_bookings_for_slot($date, $slot['start_time']);
            if ($booked_count < $slot['max_bookings']) {
                $slot['booked_count']    = $booked_count;
                $slot['remaining_slots'] = $slot['max_bookings'] - $booked_count;
                $available[]             = $slot;
            }
        }
        return $available;
    }

    /**
     * Returns dates (Y-m-d) in a month that have at least one available slot.
     */
    public function get_available_dates_in_month($year, $month)
    {
        $year  = (int)$year;
        $month = (int)$month;
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $available_days = [];
        $today = date('Y-m-d');

        // Get days of week that have slots
        $active_days = $this->db
            ->select('DISTINCT day_of_week')
            ->where('is_available', 1)
            ->get($this->slot_table)
            ->result_array();

        $active_dow = array_column($active_days, 'day_of_week');

        for ($d = 1; $d <= $days_in_month; $d++) {
            $date = sprintf('%04d-%02d-%02d', $year, $month, $d);
            if ($date < $today) continue;
            $dow = (int)date('N', strtotime($date));
            if (in_array($dow, $active_dow)) {
                // Check if at least one slot still has capacity
                if (!empty($this->get_available_slots($date))) {
                    $available_days[] = $date;
                }
            }
        }
        return $available_days;
    }

    private function _count_bookings_for_slot($date, $start_time)
    {
        return $this->db
            ->where('booking_date', $date)
            ->where('booking_time', $start_time)
            ->where_in('status', ['pending', 'confirmed'])
            ->get($this->table)
            ->num_rows();
    }

    public function is_slot_available($date, $time, $slot_id)
    {
        $slot = $this->get_slot_by_id($slot_id);
        if (!$slot || !$slot['is_available']) return FALSE;
        $booked = $this->_count_bookings_for_slot($date, $time);
        return $booked < $slot['max_bookings'];
    }

    // ── BOOKINGS CRUD ─────────────────────────────────────────────────

    public function get_all($filters = [])
    {
        if (!empty($filters['status'])) {
            $this->db->where($this->table . '.status', $this->db->escape_str($filters['status']));
        }
        if (isset($filters['is_read']) && $filters['is_read'] !== '') {
            $this->db->where($this->table . '.is_read', (int)$filters['is_read']);
        }
        return $this->db
            ->select($this->table . '.*, bs.start_time as slot_start, bs.end_time as slot_end, bs.slot_duration')
            ->from($this->table)
            ->join($this->slot_table . ' bs', 'bs.id = ' . $this->table . '.slot_id', 'left')
            ->order_by($this->table . '.booking_date', 'ASC')
            ->order_by($this->table . '.booking_time', 'ASC')
            ->get()
            ->result_array();
    }

    public function get_upcoming($limit = 10)
    {
        return $this->db
            ->select($this->table . '.*, bs.slot_duration')
            ->from($this->table)
            ->join($this->slot_table . ' bs', 'bs.id = ' . $this->table . '.slot_id', 'left')
            ->where($this->table . '.booking_date >=', date('Y-m-d'))
            ->where_in($this->table . '.status', ['pending', 'confirmed'])
            ->order_by($this->table . '.booking_date', 'ASC')
            ->order_by($this->table . '.booking_time', 'ASC')
            ->limit((int)$limit)
            ->get()
            ->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->select($this->table . '.*, bs.start_time as slot_start, bs.end_time as slot_end, bs.slot_duration, bs.day_of_week')
            ->from($this->table)
            ->join($this->slot_table . ' bs', 'bs.id = ' . $this->table . '.slot_id', 'left')
            ->where($this->table . '.id', (int)$id)
            ->get()
            ->row_array();
    }

    public function create($data)
    {
        $insert = [
            'slot_id'          => !empty($data['slot_id']) ? (int)$data['slot_id'] : NULL,
            'name'             => $this->db->escape_str(trim($data['name'])),
            'email'            => $this->db->escape_str(trim($data['email'])),
            'phone'            => $this->db->escape_str(trim($data['phone'] ?? '')),
            'company_name'     => $this->db->escape_str(trim($data['company_name'] ?? '')),
            'service_type'     => $this->db->escape_str(trim($data['service_type'] ?? '')),
            'booking_date'     => $this->db->escape_str($data['booking_date']),
            'booking_time'     => $this->db->escape_str($data['booking_time']),
            'timezone'         => $this->db->escape_str($data['timezone'] ?? 'Asia/Kolkata'),
            'duration_minutes' => (int)($data['duration_minutes'] ?? 30),
            'meeting_type'     => in_array($data['meeting_type'] ?? '', ['google_meet', 'zoom', 'phone', 'office']) ? $data['meeting_type'] : 'google_meet',
            'message'          => $this->db->escape_str(trim($data['message'] ?? '')),
            'status'           => 'pending',
            'is_read'          => 0,
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s'),
        ];
        $this->db->insert($this->table, $insert);
        return $this->db->insert_id();
    }

    public function update_status($id, $status, $extras = [])
    {
        $allowed = ['pending', 'confirmed', 'completed', 'cancelled'];
        if (!in_array($status, $allowed)) return FALSE;
        $update = [
            'status'     => $status,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if (!empty($extras['admin_notes'])) {
            $update['admin_notes'] = $this->db->escape_str(trim($extras['admin_notes']));
        }
        if (!empty($extras['meeting_link'])) {
            $update['meeting_link'] = $this->db->escape_str(trim($extras['meeting_link']));
        }
        return $this->db->where('id', (int)$id)->update($this->table, $update);
    }

    public function mark_read($id)
    {
        return $this->db->where('id', (int)$id)->update($this->table, ['is_read' => 1]);
    }

    public function delete($id)
    {
        return $this->db->where('id', (int)$id)->delete($this->table);
    }

    public function count_unread()
    {
        return $this->db->where('is_read', 0)->get($this->table)->num_rows();
    }

    public function count_by_status($status)
    {
        return $this->db->where('status', $this->db->escape_str($status))->get($this->table)->num_rows();
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
    }
}
