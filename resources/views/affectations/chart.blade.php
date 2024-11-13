<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Vue calendaire des affectation') }}
            <a href="{{ route('affectations.index', $profil) }}"
                class="bg-gray-500 hover:bg-gray-700 text-white text-xs leading-5 uppercase tracking-widest py-2 px-3 rounded">
                Retour
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="gantt" style='width:100%;min-height:50vh;'></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="/gantt/codebase/dhtmlxgantt.js"></script>
<link rel="stylesheet" href="/gantt/codebase/dhtmlxgantt.css" type="text/css">

<script>
    window.addEventListener('DOMContentLoaded', function() {
        gantt.config.date_format = "%H:%i %d-%m-%Y";
        gantt.scales = [{
            unit: "month",
            step: 1,
            format: "%m"
        }];

        gantt.init("gantt");
        gantt.parse({
            data: [{
                    id: 1,
                    text: "AAA001 - M (2/2)",
                    open: false,
                },
                {
                    id: 11,
                    text: "FAVAREL Clément - M",
                    start_date: "00:00 05-11-2024",
                    duration: 10,
                    parent: 1,
                    progress: 1
                },
                {
                    id: 12,
                    text: "SALAUN Matthieu - M",
                    start_date: "00:00 05-11-2024",
                    duration: 10,
                    parent: 1,
                    progress: 0.5
                },
                {
                    id: 2,
                    text: "AAA002 - F (2/4)",
                    open: false,
                },
                {
                    id: 21,
                    text: "COLLODET Laetitia - F",
                    start_date: "00:00 05-11-2024",
                    duration: 5,
                    parent: 2,
                    progress: 1
                },
                {
                    id: 22,
                    text: "ALBERTINI Romane - F",
                    start_date: "00:00 10-11-2024",
                    duration: 5,
                    parent: 2,
                    progress: 0.5
                },
                // {
                //     id: 4,
                //     text: "Task #3",
                //     start_date: null,
                //     duration: null,
                //     parent: 1,
                //     progress: 0.8,
                //     open: true
                // },
                // {
                //     id: 5,
                //     text: "Task #3.1",
                //     start_date: "2024-11-09 00:00",
                //     duration: 2,
                //     parent: 4,
                //     progress: 0.2
                // },
                // {
                //     id: 6,
                //     text: "Task #3.2",
                //     start_date: "2024-11-11 00:00",
                //     duration: 1,
                //     parent: 4,
                //     progress: 0
                // }
            ],
            // links: [{
            //         id: 1,
            //         source: 2,
            //         target: 3,
            //         type: "0"
            //     },
            //     {
            //         id: 2,
            //         source: 3,
            //         target: 4,
            //         type: "0"
            //     },
            //     {
            //         id: 3,
            //         source: 5,
            //         target: 6,
            //         type: "0"
            //     }
            // ]
        });
    });
</script>
