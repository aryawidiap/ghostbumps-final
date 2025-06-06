public function getAvailableTimeSlot(Request $request) {
        $allTimeSlot = [];

        for ($i=10; $i <= 20; $i++) { 
            $allTimeSlot.array_push([
                "time" => $i,
                "isAvailable" => true,
            ]);
        }

        $date = $request->input('date');
        // var_dump($date);

        $availableTimeSlot = [...$allTimeSlot,$date];

        $allTimeSlot = [];


        return $availableTimeSlot;
    }