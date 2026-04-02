<?php
class Dashboard_model extends CI_Model {
    
    public function get_dashboard_stats() {
        // Get total athletes
        $total_athletes = $this->db->count_all('athletes');
        
        // Get total officers
        $total_officers = $this->db->count_all('officers');
        
        // Get active sports (distinct count) - REMOVED STATUS FILTER
        $this->db->distinct();
        $this->db->select('sport');
        // Remove this line: $this->db->where('status', 'active');
        $active_sports = $this->db->count_all_results('athletes');
        
        // Get new registrations this month
        $this->db->where('created_at >=', date('Y-m-01'));
        $new_registrations = $this->db->count_all_results('athletes');
        
        // Get gender distribution
        $male_count = $this->db->where('sex', 'Male')->count_all_results('athletes');
        $female_count = $this->db->where('sex', 'Female')->count_all_results('athletes');
        $other_count = $this->db->where('sex', 'Other')->count_all_results('athletes');
        
        // Get age distribution
        $age_distribution = [
            $this->db->where('age >=', 13)->where('age <=', 18)->count_all_results('athletes'),
            $this->db->where('age >=', 19)->where('age <=', 25)->count_all_results('athletes'),
            $this->db->where('age >=', 26)->where('age <=', 35)->count_all_results('athletes'),
            $this->db->where('age >=', 36)->where('age <=', 45)->count_all_results('athletes'),
            $this->db->where('age >=', 46)->count_all_results('athletes')
        ];
        
        return [
            'total_athletes' => $total_athletes,
            'total_officers' => $total_officers,
            'active_sports' => $active_sports,
            'new_registrations' => $new_registrations,
            'male_count' => $male_count,
            'female_count' => $female_count,
            'other_count' => $other_count,
            'age_distribution' => $age_distribution
        ];
    }
    
    public function get_recent_activities($limit = 10) {
        // Check if activities table exists, if not return dummy data
        if (!$this->db->table_exists('activities')) {
            return $this->get_dummy_activities($limit);
        }
        
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('activities')->result_array();
    }
    
    public function get_sports_distribution() {
        $this->db->select('sport, COUNT(*) as count');
        $this->db->group_by('sport');
        $this->db->order_by('count', 'DESC');
        return $this->db->get('athletes')->result_array();
    }
    
    private function get_dummy_activities($limit) {
        // Return dummy activities if table doesn't exist
        $activities = [];
        $types = ['athlete', 'officer', 'sport', 'event'];
        $actions = ['added', 'updated', 'deleted', 'registered'];
        
        for ($i = 0; $i < $limit; $i++) {
            $type = $types[array_rand($types)];
            $action = $actions[array_rand($actions)];
            $time = $this->get_random_time($i);
            
            $activities[] = [
                'id' => $i + 1,
                'type' => $type,
                'action' => $action,
                'description' => ucfirst($type) . ' ' . $action . ' successfully',
                'user_id' => 1,
                'created_at' => date('Y-m-d H:i:s', strtotime('-' . ($i * 2) . ' hours'))
            ];
        }
        
        return $activities;
    }
    
    private function get_random_time($index) {
        $times = [
            'Just now',
            '10 minutes ago',
            '30 minutes ago',
            '1 hour ago',
            '2 hours ago',
            '3 hours ago',
            '5 hours ago',
            'Yesterday',
            '2 days ago',
            '1 week ago'
        ];
        
        return isset($times[$index]) ? $times[$index] : $times[array_rand($times)];
    }
}
?>