<html>
<head>
    <title>Relevé de notes de  - {{ $my_class->name.' '.$section->name.' - '.$ex->name.' ('.$year.')' }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/print_tabulation.css') }}" />
</head>
<body>
<div class="container">
    <div id="print" xmlns:margin-top="http://www.w3.org/1999/xhtml">
        {{--    Logo N School Details--}}
        <table width="100%">
            <tr>
                {{--<td><img src="{{ $s['logo'] }}" style="max-height : 100px;"></td>--}}

                <td >
                    <strong><span style="color: #1b0c80; font-size: 25px;">{{ strtoupper(Qs::getSetting('system_name')) }}</span></strong><br/>
                    {{-- <strong><span style="color: #1b0c80; font-size: 20px;">MINNA, NIGER STATE</span></strong><br/>--}}
                    <strong><span
                                style="color: #000; font-size: 15px;"><i>{{ ucwords($s['address']) }}</i></span></strong><br/>
                    <strong><span style="color: #000; font-size: 15px;"> Relevé de notes de  {{ strtoupper($my_class->name.' '.$section->name.' - '.$ex->name.' ('.$year.')' ) }}
                    </span></strong>
                </td>
            </tr>
        </table>
        <br/>

        {{--Background Logo--}}
        <div style="position: relative;  text-align: center; ">
            <img src="{{ $s['logo'] }}"
                 style="max-width: 500px; max-height:600px; margin-top: 60px; position:absolute ; opacity: 0.2; margin-left: auto;margin-right: auto; left: 0; right: 0;" />
        </div>

        {{-- Tabulation Begins --}}
        <table style="width:100%; border-collapse:collapse; border: 1px solid #000; margin: 10px auto;" border="1">
       <!-- ... Le reste de votre code ... -->

<thead>
    <tr>
        <th>#</th>
        <th>Nom de l'étudiant</th>
        @foreach($subjects as $sub)
            <th colspan="2" style="text-align: center;">{{ strtoupper($sub->slug ?: $sub->name) }}</th>
        @endforeach
        <th style="color: darkred">Moyenne</th>
        <th style="color: darkblue">Total</th>
        <th style="color: darkgreen">Position</th>
    </tr>

    <tr>
        <th></th>
        <th></th>
        @foreach($subjects as $sub)
            <th>Devoir</th>
            <th>Compo</th>
        @endforeach
    </tr>
</thead>

<tbody>
    @foreach($students as $s)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td style="text-align: center">{{ $s->user->name }}</td>
            @foreach($subjects as $sub)
                @php
                    $mark = $marks->where('student_id', $s->user_id)->where('subject_id', $sub->id)->first();
                @endphp

                <td>{{ $mark->tca ?? '-' }}</td>
                <td>{{ $mark->exm ?? '-' }}</td>
            @endforeach

            <td style="color: darkred">{{ $exr->where('student_id', $s->user_id)->first()->ave ?: '-' }}</td>
            <td style="color: darkred">{{ $exr->where('student_id', $s->user_id)->first()->total ?: '-' }}</td>
            <td style="color: darkgreen">{!! Mk::getSuffix($exr->where('student_id', $s->user_id)->first()->pos) ?: '-' !!}</td>
        </tr>
    @endforeach
</tbody>

<!-- ... Le reste de votre code ... -->

                </table>
    </div>
</div>

<script>
    window.print();
</script>
</body>
</html>
