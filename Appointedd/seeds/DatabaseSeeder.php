<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Slot;
use App\Staff;
use App\Customer;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('SlotTableSeeder');
        $this->call('CustomerTableSeeder');
        $this->call('StaffTableSeeder');

        Model::reguard();
    }
}
/**
*  populate the slot table with time, in the interval of 1 hr
*/
class SlotTableSeeder extends Seeder
{
    
    public function run()
    {
        $start = "09:00";
        $end = "18:00";
        $strEnTim = strtotime("10.00");

        $slotStart = strtotime($start);
        $slotEnd = strtotime($end);
        $slotNow = $slotStart;

        for( $i=$slotStart, $j=$strEnTim; $i, $j<=$slotEnd; $i+=3600, $j+=3600) {
            if(( $i < $slotNow) && ( $j < $strEnTim)) continue;
            Slot::create([
                'start_time' => date("H:i",$i),
                'end_time' => date("H:i", $j)
            ]);
        }

    }    
}

/**
* assume that the customers are already register in the database before booking for service
*/

class CustomerTableSeeder extends Seeder
{
    
    public function run()
    {
        Customer::create([
            'name' => 'Chika'
        ]);

        Customer::create([
            'name' => 'Billy'
        ]);

        Customer::create([
            'name' => 'Gabby'
        ]);
    }
}

/**
* assume we only have two staffs to render the service
*/


class StaffTableSeeder extends Seeder
{
    
    public function run()
    {
        Staff::create([
            'name' => 'David'
        ]);

        Staff::create([
             'name' => 'Willy'
        ]);
         
    }
}