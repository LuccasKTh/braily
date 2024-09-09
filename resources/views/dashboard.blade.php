<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notícias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex">
                        <div id="geochart-colors" style="width: 1125px; height: 625px;"></div>
                        <div class="flex">
                            <div class="w-full">
                                <div id="teste"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            dicEstados = {
                '1': 'Acre',
                '2': 'Alagoas',
                '3': 'Amapa',
                '4': 'Amazonas',
                '5': 'Bahia',
                '6': 'Ceara',
                '7': 'Distrito Federal',
                '8': 'Espirito Santo',
                '9': 'Goias',
                '10': 'Maranhao',
                '11': 'Mato Grosso',
                '12': 'Mato Grosso do Sul',
                '13': 'Minas Gerais',
                '14': 'Para',
                '15': 'Paraiba',
                '16': 'Parana',
                '17': 'Pernambuco',
                '18': 'Piaui',
                '19': 'Rio de Janeiro',
                '20': 'Rio Grande do Norte',
                '21': 'Rio Grande do Sul',
                '22': 'Rondonia',
                '23': 'Roraima',
                '24': {
                    estado: 'Santa Catarina',
                    habitantes: 7164788,
                    deficientes: 183322
                },
                '25': 'Sao Paulo',
                '26': 'Sergipe',
                '27': 'Tocantins'
            };
    
            google.charts.load('current', {
                'packages':['geochart'],
                'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
            });
            google.charts.setOnLoadCallback(drawRegionsMap);
    
            function drawRegionsMap() {
                var data = google.visualization.arrayToDataTable([
                    ['Country'],
                    ['Brazil'],
                    ['Acre'],
                    ['Alagoas'],
                    ['Amapa'],
                    ['Amazonas'],
                    ['Bahia'],
                    ['Ceara'],
                    ['Distrito Federal'],
                    ['Espirito Santo'],
                    ['Goias'],
                    ['Maranhao'],
                    ['Mato Grosso'],
                    ['Mato Grosso do Sul'],
                    ['Minas Gerais'],
                    ['Para'],
                    ['Paraiba'],
                    ['Parana'],
                    ['Pernambuco'],
                    ['Piaui'],
                    ['Rio de Janeiro'],
                    ['Rio Grande do Norte'],
                    ['Rio Grande do Sul'],
                    ['Rondonia'],
                    ['Roraima'],
                    ['Santa Catarina'],
                    ['Sao Paulo'],
                    ['Sergipe'],
                    ['Tocantins']
                ]);
        
                var options = {
                    region: 'BR',
                    resolution: 'provinces',
                    defaultColor: '#dedfe0',
                    enableRegionInteractivity: true,
                    forceIFrame: true
                };
        
                var chart = new google.visualization.GeoChart(document.getElementById('geochart-colors'));
                google.visualization.events.addListener(chart, 'select', function(option) {
                    if (chart.getSelection()[0] != undefined) {
                        selection = chart.getSelection()[0].row;
                    } else {
                        selection = 24;
                        chart.draw(data, options);
                    }
                    console.log(selection);
                    $('#teste').text(dicEstados[selection].habitantes);
                });

                chart.draw(data, options);
            };
        </script>
    @endpush
</x-app-layout>
