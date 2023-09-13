<x-admin.dashboard-layout>

    <div style="max-width: 70%; margin-left: 5rem; margin-bottom: 3rem;">
        <h1><strong>{{ $chart1->options['chart_title'] }}</strong></h1>
        {!! $chart1->renderHtml() !!}
    </div>

    <hr class="py-10">

    <div style="max-width: 70%; margin-left: 5rem; margin-bottom: 3rem;">
        <h1><strong>{{ $chart3->options['chart_title'] }}</strong></h1>
        {!! $chart3->renderHtml() !!}
    </div>


    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderChartJsLibrary() !!}

    {!! $chart1->renderJs() !!}
    {!! $chart3->renderJs() !!}

</x-admin.dashboard-layout>