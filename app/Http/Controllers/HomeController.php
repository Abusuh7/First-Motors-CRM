<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Notifications;
use App\Models\User;
use App\Models\User_Details;
use App\Models\Vehicle_Details;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        // if ($role == '1') {
        //     return view('admin.home');
        // } elseif ($role == '0') {
        //     return view('dashboard');
        // } else {
        //     return view('shop.logged-index');
        // }

        if ($role == "admin") {
            $users = User::all();
            $usersCount = $users->count();

            //get the count of admin users
            $adminUsers = User::where('role', 'admin')->get();
            $adminCount = $adminUsers->count();

            //get the count of staff users
            $staffUsers = User::where('role', 'staff')->get();
            $staffCount = $staffUsers->count();

            //get the count of customer users
            $customerUsers = User::where('role', 'customer')->get();
            $customerCount = $customerUsers->count();

            //new users who joint today
            $newUsers = User::whereDate('created_at', date('Y-m-d'))->get();
            $newUsersCount = $newUsers->count();

            //get the test drive notification count where notifcation_staus is unread
            $testDriveCount = Notifications::where('notification_type', 'test_drive')->where('notification_status', 'unread')->get()->count();

            //get the purchase notification count where notifcation_staus is unread
            $purchaseCount = Notifications::where('notification_type', 'purchase')->where('notification_status', 'unread')->get()->count();

            //get the total count of vehicles where status is available
            $vehiclesCount = Vehicle_Details::where('availability', 'available')->get()->count();

            //get the total count of vehicles where status is sold
            $soldVehiclesCount = Vehicle_Details::where('availability', 'sold')->get()->count();

            //get all the test drive bookings count
            $testDriveTotalCount = Bookings::where('booking_type', 'test_drive')->get()->count();

            //get all the purchase bookings count
            $purchaseTotalCount = Bookings::where('booking_type', 'purchase')->get()->count();





            //------------------------------GRAPH DATA--------------------------------



            //----BAR GRAPH DATA----

            //--------------------------Last 7 days--------------------------

            // Get the current date
            $currentDate = now();

            // Get user count whose city is Colombo for the past 7 days
            $colomboUsers = User_Details::where('city', 'colombo')
                ->where('created_at', '>=', $currentDate->subDays(7))
                ->get()
                ->count();

            // Get user count whose city is Anuradhapura for the past 7 days
            $anuradhapuraUsers = User_Details::where('city', 'anuradhapura')
                ->where('created_at', '>=', $currentDate->subDays(7))
                ->get()
                ->count();

            // Get user count whose city is Kalutara for the past 7 days
            $kalutaraUsers = User_Details::where('city', 'kalutara')
                ->where('created_at', '>=', $currentDate->subDays(7))
                ->get()
                ->count();

            // Get user count whose city is Kandy for the past 7 days
            $kandyUsers = User_Details::where('city', 'kandy')
                ->where('created_at', '>=', $currentDate->subDays(7))
                ->get()
                ->count();

            // Get user count whose city is Galle for the past 7 days
            $galleUsers = User_Details::where('city', 'galle')
                ->where('created_at', '>=', $currentDate->subDays(7))
                ->get()
                ->count();

            // Get users who are none of the above for the past 7 days
            $otherUsers = User_Details::whereNotIn('city', ['colombo', 'anuradhapura', 'kalutara', 'kandy', 'galle'])
                ->where('created_at', '>=', $currentDate->subDays(7))
                ->get()
                ->count();

            //get all these counts in an array
            $cityCount = array(
                $colomboUsers,
                $kalutaraUsers,
                $galleUsers,
                $anuradhapuraUsers,
                $kandyUsers,
                $otherUsers
            );


            //--------------------------Last 30 days--------------------------

            // Get the current date
            $currentDate = now();

            // Initialize arrays to store counts for each city
            $cityCount1 = array(
                'Colombo' => 0,
                'Anuradhapura' => 0,
                'Kalutara' => 0,
                'Kandy' => 0,
                'Galle' => 0,
                'Other' => 0
            );

            // Loop through the last 30 days
            for ($i = 0; $i < 30; $i++) {
                // Calculate the start and end date for the current day
                $startDate = $currentDate->copy()->subDays($i)->startOfDay();
                $endDate = $currentDate->copy()->subDays($i)->endOfDay();

                // Get user counts for each city within the date range
                $cityCount1['Colombo'] += User_Details::where('city', 'colombo')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

                $cityCount1['Anuradhapura'] += User_Details::where('city', 'anuradhapura')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

                $cityCount1['Kalutara'] += User_Details::where('city', 'kalutara')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

                $cityCount1['Kandy'] += User_Details::where('city', 'kandy')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

                $cityCount1['Galle'] += User_Details::where('city', 'galle')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

                // Get user counts for other cities within the date range
                $cityCount1['Other'] += User_Details::whereNotIn('city', ['colombo', 'anuradhapura', 'kalutara', 'kandy', 'galle'])
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();
            }


            //--------------------------Last 365 days--------------------------

            // Get the current date
            $currentDate = now();

            // Initialize arrays to store counts for each city
            $cityCount2 = array(
                'Colombo' => 0,
                'Anuradhapura' => 0,
                'Kalutara' => 0,
                'Kandy' => 0,
                'Galle' => 0,
                'Other' => 0
            );

            // Loop through the last 365 days (approximately one year)
            for ($i = 0; $i < 365; $i++) {
                // Calculate the start and end date for the current day
                $startDate = $currentDate->copy()->subDays($i)->startOfDay();
                $endDate = $currentDate->copy()->subDays($i)->endOfDay();

                // Get user counts for each city within the date range
                $cityCount2['Colombo'] += User_Details::where('city', 'colombo')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

                $cityCount2['Anuradhapura'] += User_Details::where('city', 'anuradhapura')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

                $cityCount2['Kalutara'] += User_Details::where('city', 'kalutara')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

                $cityCount2['Kandy'] += User_Details::where('city', 'kandy')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

                $cityCount2['Galle'] += User_Details::where('city', 'galle')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

                // Get user counts for other cities within the date range
                $cityCount2['Other'] += User_Details::whereNotIn('city', ['colombo', 'anuradhapura', 'kalutara', 'kandy', 'galle'])
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();
            }



            //-----LINE GRAPH DATA----

            // ---------------------TOTAL REVENUE---------------------------

            //get all the sold vehicles
            $soldVehicles = Vehicle_Details::where('availability', 'sold')->get();

            //get the total revenue
            $totalRevenue = 0;
            foreach ($soldVehicles as $soldVehicle) {
                $totalRevenue += $soldVehicle->vehicle_selling_price;
            }


            //-----------------------LAST SEVEN DAYS--------------------------

            //get all the sold vehicles
            $soldVehicles = Vehicle_Details::where('availability', 'sold')->get();

            //get the total revenue of this week for 7 days monday till sunday and store in an array
            $lastSevenDates = array();
            $lastSevenDays = array();
            $totalRevenueLastSevenDays = array_fill(0, 7, 0);

            // Get today's date
            $today = new DateTime();

            // Define an array of day names
            $dayNames = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

            // Loop through the last 7 days
            for ($i = 0; $i < 7; $i++) {
                // Clone the current date
                $date = clone $today;

                // Subtract $i days from the current date
                $date->sub(new DateInterval("P{$i}D"));

                // Format the date in 'Y-m-d' format
                $formattedDate = $date->format('Y-m-d');

                // Get the day of the week (0 = Sunday, 1 = Monday, etc.)
                $dayOfWeek = $date->format('w');

                // Get the day name from the dayNames array
                $dayName = $dayNames[$dayOfWeek];

                // Add the date to the $lastSevenDates array
                $lastSevenDates[] = $formattedDate;

                // Add the day name to the $lastSevenDays array
                $lastSevenDays[] = $dayName;


                foreach ($soldVehicles as $soldVehicle) {
                    if (date('Y-m-d', strtotime($soldVehicle->updated_at)) == $formattedDate) {
                        $totalRevenueLastSevenDays[$i] += $soldVehicle->vehicle_selling_price;
                    }
                }

            }

            //-----------------------LAST 30 DAYS--------------------------

            // Get all the sold vehicles
            $soldVehicles = Vehicle_Details::where('availability', 'sold')->get();

            // Initialize arrays for the last 30 days
            $lastThirtyDates = array();
            $lastThirtyDays = array();
            $totalRevenueLastThirtyDays = array_fill(0, 30, 0);

            // Get today's date
            $today = new DateTime();

            // Define an array of day names
            $dayNames = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

            // Loop through the last 30 days
            for ($i = 0; $i < 30; $i++) {
                // Clone the current date
                $date = clone $today;

                // Subtract $i days from the current date
                $date->sub(new DateInterval("P{$i}D"));

                // Format the date in 'Y-m-d' format
                $formattedDate = $date->format('Y-m-d');

                // Get the day of the week (0 = Sunday, 1 = Monday, etc.)
                $dayOfWeek = $date->format('w');

                // Get the day name from the dayNames array
                $dayName = $dayNames[$dayOfWeek];

                // Add the date to the $lastThirtyDates array
                $lastThirtyDates[] = $formattedDate;

                // Add the day name to the $lastThirtyDays array
                $lastThirtyDays[] = $dayName;

                foreach ($soldVehicles as $soldVehicle) {
                    if (date('Y-m-d', strtotime($soldVehicle->updated_at)) == $formattedDate) {
                        $totalRevenueLastThirtyDays[$i] += $soldVehicle->vehicle_selling_price;
                    }
                }
            }

            //-----------------------LAST 365 DAYS--------------------------

            // Get all the sold vehicles
            $soldVehicles = Vehicle_Details::where('availability', 'sold')->get();

            // Initialize arrays for the last 12 months
            $lastYearMonths = array();
            $totalRevenueLastYearMonths = array_fill(0, 12, 0);

            // Get today's date
            $today = new DateTime();

            // Loop through the last 12 months
            for ($i = 0; $i < 12; $i++) {
                // Clone the current date
                $date = clone $today;

                // Subtract $i months from the current date
                $date->sub(new DateInterval("P{$i}M"));

                // Format the date to represent the month (e.g., 'Jan', 'Feb', 'Mar')
                $formattedMonth = $date->format('M');

                // Add the formatted month to the $lastYearMonths array
                $lastYearMonths[] = $formattedMonth;

                foreach ($soldVehicles as $soldVehicle) {
                    // Extract year and month from the sold vehicle's updated_at date
                    $soldYearMonth = date('M', strtotime($soldVehicle->updated_at));

                    if ($soldYearMonth == $formattedMonth) {
                        $totalRevenueLastYearMonths[$i] += $soldVehicle->vehicle_selling_price;
                    }
                }
            }



            // print_r($lastSevenDates);
            // print_r($lastSevenDays);
            // print_r($totalRevenueLastSevenDays);






            return view('admin.home', compact(
                'usersCount',
                'adminCount',
                'staffCount',
                'customerCount',
                'newUsersCount',
                'testDriveCount',
                'purchaseCount',
                'vehiclesCount',
                'soldVehiclesCount',
                'testDriveTotalCount',
                'purchaseTotalCount',
                //REVENUE
                'totalRevenue',
                //LAST 7 DAYS
                'cityCount',
                'lastSevenDates',
                'lastSevenDays',
                'totalRevenueLastSevenDays',
                //LAST 30 DAYS
                'cityCount1',
                'lastThirtyDates',
                'lastThirtyDays',
                'totalRevenueLastThirtyDays',
                //LAST 365 DAYS
                'cityCount2',
                'lastYearMonths',
                'totalRevenueLastYearMonths'

            ));
        } elseif ($role == "staff") {
            return view('dashboard');
        } else {
            return view('shop.logged-index');
        }
    }

    public function adminHome()
    {
        $users = User::all();
        $usersCount = $users->count();

        //get the count of admin users
        $adminUsers = User::where('role', 'admin')->get();
        $adminCount = $adminUsers->count();

        //get the count of staff users
        $staffUsers = User::where('role', 'staff')->get();
        $staffCount = $staffUsers->count();

        //get the count of customer users
        $customerUsers = User::where('role', 'customer')->get();
        $customerCount = $customerUsers->count();

        //new users who joint today
        $newUsers = User::whereDate('created_at', date('Y-m-d'))->get();
        $newUsersCount = $newUsers->count();

        //get the test drive notification count where notifcation_staus is unread
        $testDriveCount = Notifications::where('notification_type', 'test_drive')->where('notification_status', 'unread')->get()->count();

        //get the purchase notification count where notifcation_staus is unread
        $purchaseCount = Notifications::where('notification_type', 'purchase')->where('notification_status', 'unread')->get()->count();

        //get the total count of vehicles where status is available
        $vehiclesCount = Vehicle_Details::where('availability', 'available')->get()->count();

        //get the total count of vehicles where status is sold
        $soldVehiclesCount = Vehicle_Details::where('availability', 'sold')->get()->count();

        //get all the test drive bookings count
        $testDriveTotalCount = Bookings::where('booking_type', 'test_drive')->get()->count();

        //get all the purchase bookings count
        $purchaseTotalCount = Bookings::where('booking_type', 'purchase')->get()->count();


        //------------------------------GRAPH DATA--------------------------------



        //----BAR GRAPH DATA----

        //--------------------------Last 7 days--------------------------

        // Get the current date
        $currentDate = now();

        // Get user count whose city is Colombo for the past 7 days
        $colomboUsers = User_Details::where('city', 'colombo')
            ->where('created_at', '>=', $currentDate->subDays(7))
            ->get()
            ->count();

        // Get user count whose city is Anuradhapura for the past 7 days
        $anuradhapuraUsers = User_Details::where('city', 'anuradhapura')
            ->where('created_at', '>=', $currentDate->subDays(7))
            ->get()
            ->count();

        // Get user count whose city is Kalutara for the past 7 days
        $kalutaraUsers = User_Details::where('city', 'kalutara')
            ->where('created_at', '>=', $currentDate->subDays(7))
            ->get()
            ->count();

        // Get user count whose city is Kandy for the past 7 days
        $kandyUsers = User_Details::where('city', 'kandy')
            ->where('created_at', '>=', $currentDate->subDays(7))
            ->get()
            ->count();

        // Get user count whose city is Galle for the past 7 days
        $galleUsers = User_Details::where('city', 'galle')
            ->where('created_at', '>=', $currentDate->subDays(7))
            ->get()
            ->count();

        // Get users who are none of the above for the past 7 days
        $otherUsers = User_Details::whereNotIn('city', ['colombo', 'anuradhapura', 'kalutara', 'kandy', 'galle'])
            ->where('created_at', '>=', $currentDate->subDays(7))
            ->get()
            ->count();

        //get all these counts in an array
        $cityCount = array(
            $colomboUsers,
            $kalutaraUsers,
            $galleUsers,
            $anuradhapuraUsers,
            $kandyUsers,
            $otherUsers
        );


        //--------------------------Last 30 days--------------------------

        // Get the current date
        $currentDate = now();

        // Initialize arrays to store counts for each city
        $cityCount1 = array(
            'Colombo' => 0,
            'Anuradhapura' => 0,
            'Kalutara' => 0,
            'Kandy' => 0,
            'Galle' => 0,
            'Other' => 0
        );

        // Loop through the last 30 days
        for ($i = 0; $i < 30; $i++) {
            // Calculate the start and end date for the current day
            $startDate = $currentDate->copy()->subDays($i)->startOfDay();
            $endDate = $currentDate->copy()->subDays($i)->endOfDay();

            // Get user counts for each city within the date range
            $cityCount1['Colombo'] += User_Details::where('city', 'colombo')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            $cityCount1['Anuradhapura'] += User_Details::where('city', 'anuradhapura')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            $cityCount1['Kalutara'] += User_Details::where('city', 'kalutara')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            $cityCount1['Kandy'] += User_Details::where('city', 'kandy')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            $cityCount1['Galle'] += User_Details::where('city', 'galle')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            // Get user counts for other cities within the date range
            $cityCount1['Other'] += User_Details::whereNotIn('city', ['colombo', 'anuradhapura', 'kalutara', 'kandy', 'galle'])
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
        }


        //--------------------------Last 365 days--------------------------

        // Get the current date
        $currentDate = now();

        // Initialize arrays to store counts for each city
        $cityCount2 = array(
            'Colombo' => 0,
            'Anuradhapura' => 0,
            'Kalutara' => 0,
            'Kandy' => 0,
            'Galle' => 0,
            'Other' => 0
        );

        // Loop through the last 365 days (approximately one year)
        for ($i = 0; $i < 365; $i++) {
            // Calculate the start and end date for the current day
            $startDate = $currentDate->copy()->subDays($i)->startOfDay();
            $endDate = $currentDate->copy()->subDays($i)->endOfDay();

            // Get user counts for each city within the date range
            $cityCount2['Colombo'] += User_Details::where('city', 'colombo')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            $cityCount2['Anuradhapura'] += User_Details::where('city', 'anuradhapura')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            $cityCount2['Kalutara'] += User_Details::where('city', 'kalutara')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            $cityCount2['Kandy'] += User_Details::where('city', 'kandy')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            $cityCount2['Galle'] += User_Details::where('city', 'galle')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            // Get user counts for other cities within the date range
            $cityCount2['Other'] += User_Details::whereNotIn('city', ['colombo', 'anuradhapura', 'kalutara', 'kandy', 'galle'])
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
        }



        //-----LINE GRAPH DATA----

        // ---------------------TOTAL REVENUE---------------------------

        //get all the sold vehicles
        $soldVehicles = Vehicle_Details::where('availability', 'sold')->get();

        //get the total revenue
        $totalRevenue = 0;
        foreach ($soldVehicles as $soldVehicle) {
            $totalRevenue += $soldVehicle->vehicle_selling_price;
        }


        //-----------------------LAST SEVEN DAYS--------------------------

        //get all the sold vehicles
        $soldVehicles = Vehicle_Details::where('availability', 'sold')->get();

        //get the total revenue of this week for 7 days monday till sunday and store in an array
        $lastSevenDates = array();
        $lastSevenDays = array();
        $totalRevenueLastSevenDays = array_fill(0, 7, 0);

        // Get today's date
        $today = new DateTime();

        // Define an array of day names
        $dayNames = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

        // Loop through the last 7 days
        for ($i = 0; $i < 7; $i++) {
            // Clone the current date
            $date = clone $today;

            // Subtract $i days from the current date
            $date->sub(new DateInterval("P{$i}D"));

            // Format the date in 'Y-m-d' format
            $formattedDate = $date->format('Y-m-d');

            // Get the day of the week (0 = Sunday, 1 = Monday, etc.)
            $dayOfWeek = $date->format('w');

            // Get the day name from the dayNames array
            $dayName = $dayNames[$dayOfWeek];

            // Add the date to the $lastSevenDates array
            $lastSevenDates[] = $formattedDate;

            // Add the day name to the $lastSevenDays array
            $lastSevenDays[] = $dayName;


            foreach ($soldVehicles as $soldVehicle) {
                if (date('Y-m-d', strtotime($soldVehicle->updated_at)) == $formattedDate) {
                    $totalRevenueLastSevenDays[$i] += $soldVehicle->vehicle_selling_price;
                }
            }
        }

        //-----------------------LAST 30 DAYS--------------------------

        // Get all the sold vehicles
        $soldVehicles = Vehicle_Details::where('availability', 'sold')->get();

        // Initialize arrays for the last 30 days
        $lastThirtyDates = array();
        $lastThirtyDays = array();
        $totalRevenueLastThirtyDays = array_fill(0, 30, 0);

        // Get today's date
        $today = new DateTime();

        // Define an array of day names
        $dayNames = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

        // Loop through the last 30 days
        for ($i = 0; $i < 30; $i++) {
            // Clone the current date
            $date = clone $today;

            // Subtract $i days from the current date
            $date->sub(new DateInterval("P{$i}D"));

            // Format the date in 'Y-m-d' format
            $formattedDate = $date->format('Y-m-d');

            // Get the day of the week (0 = Sunday, 1 = Monday, etc.)
            $dayOfWeek = $date->format('w');

            // Get the day name from the dayNames array
            $dayName = $dayNames[$dayOfWeek];

            // Add the date to the $lastThirtyDates array
            $lastThirtyDates[] = $formattedDate;

            // Add the day name to the $lastThirtyDays array
            $lastThirtyDays[] = $dayName;

            foreach ($soldVehicles as $soldVehicle) {
                if (date('Y-m-d', strtotime($soldVehicle->updated_at)) == $formattedDate) {
                    $totalRevenueLastThirtyDays[$i] += $soldVehicle->vehicle_selling_price;
                }
            }
        }

        //-----------------------LAST 365 DAYS--------------------------

        // Get all the sold vehicles
        $soldVehicles = Vehicle_Details::where('availability', 'sold')->get();

        // Initialize arrays for the last 12 months
        $lastYearMonths = array();
        $totalRevenueLastYearMonths = array_fill(0, 12, 0);

        // Get today's date
        $today = new DateTime();

        // Loop through the last 12 months
        for ($i = 0; $i < 12; $i++) {
            // Clone the current date
            $date = clone $today;

            // Subtract $i months from the current date
            $date->sub(new DateInterval("P{$i}M"));

            // Format the date to represent the month (e.g., 'Jan', 'Feb', 'Mar')
            $formattedMonth = $date->format('M');

            // Add the formatted month to the $lastYearMonths array
            $lastYearMonths[] = $formattedMonth;

            foreach ($soldVehicles as $soldVehicle) {
                // Extract year and month from the sold vehicle's updated_at date
                $soldYearMonth = date('M', strtotime($soldVehicle->updated_at));

                if ($soldYearMonth == $formattedMonth) {
                    $totalRevenueLastYearMonths[$i] += $soldVehicle->vehicle_selling_price;
                }
            }
        }



        // print_r($lastSevenDates);
        // print_r($lastSevenDays);
        // print_r($totalRevenueLastSevenDays);






        return view('admin.home', compact(
            'usersCount',
            'adminCount',
            'staffCount',
            'customerCount',
            'newUsersCount',
            'testDriveCount',
            'purchaseCount',
            'vehiclesCount',
            'soldVehiclesCount',
            'testDriveTotalCount',
            'purchaseTotalCount',
            //REVENUE
            'totalRevenue',
            //LAST 7 DAYS
            'cityCount',
            'lastSevenDates',
            'lastSevenDays',
            'totalRevenueLastSevenDays',
            //LAST 30 DAYS
            'cityCount1',
            'lastThirtyDates',
            'lastThirtyDays',
            'totalRevenueLastThirtyDays',
            //LAST 365 DAYS
            'cityCount2',
            'lastYearMonths',
            'totalRevenueLastYearMonths'

        ));
    }
}
