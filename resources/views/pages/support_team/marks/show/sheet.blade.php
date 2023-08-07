<table class="table table-bordered table-responsive text-center">
    <thead>
    <tr>
        <th rowspan="2">S/N</th>
        <th rowspan="2">MATIERES</th>
        <th rowspan="2">DEVOIR<br>(20)</th>
        <th rowspan="2">COMPOSITION<br>(20)</th>
        <th rowspan="2">MOYENNE<br>(20)</th>
        <th rowspan="2">COEFFICIENT<br>(20)</th>
        <th rowspan="2">MOYENNE x <br>(20)</th>

        {{--@if($ex->term == 3) --}}{{-- 3rd Term --}}{{--
        <th rowspan="2">TOTAL <br>(100%) 3<sup>RD</sup> TERM</th>
        <th rowspan="2">1<sup>ST</sup> <br> TERM</th>
        <th rowspan="2">2<sup>ND</sup> <br> TERM</th>
        <th rowspan="2">CUM (300%) <br> 1<sup>ST</sup> + 2<sup>ND</sup> + 3<sup>RD</sup></th>
        <th rowspan="2">CUM AVE</th>
        @endif--}}

        <th rowspan="2">RANG</th>
        <th rowspan="2">APPRECIATION</th>
        
    </tr>
    </thead>

    <tbody>
    @foreach($subjects as $sub)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sub->name }}</td>
            @foreach($marks->where('subject_id', $sub->id)->where('exam_id', $ex->id) as $mk)
                <td>{{ ($mk->tca) ?: '-' }}</td>
                <td>{{ ($mk->exm) ?: '-' }}</td>
                <td>{{ ($mk->tca2) ?: '-' }}</td>
                <td>{{ ($sub->coefficient) ?: '-' }}</td>
                <td>
                    @if($ex->term === 1) {{ ($mk->tex1) }}
                    @elseif ($ex->term === 2) {{ ($mk->tex2) }}
                    @elseif ($ex->term === 3) {{ ($mk->tex3) }}
                    @else {{ '-' }}
                    @endif
                </td>

                {{--3rd Term--}}
                {{-- @if($ex->term == 3)
                     <td>{{ $mk->tex3 ?: '-' }}</td>
                     <td>{{ Mk::getSubTotalTerm($student_id, $sub->id, 1, $mk->my_class_id, $year) }}</td>
                     <td>{{ Mk::getSubTotalTerm($student_id, $sub->id, 2, $mk->my_class_id, $year) }}</td>
                     <td>{{ $mk->cum ?: '-' }}</td>
                     <td>{{ $mk->cum_ave ?: '-' }}</td>
                 @endif--}}

                {{--Grade, Subject Position & Remarks--}}
                <td>{{$mk->sub_pos}}</td>
                <td>{{ $mk->grade ? $mk->grade->remark : '-' }}</td>
            @endforeach
        </tr>
    @endforeach
    <tr>
        <td colspan="5"><strong>NOMBRE DE POINTS OBTENUS: </strong> {{ $exr->total }}</td>
        <td colspan="4"><strong>MOYENNE FINALE: </strong> {{ $exr->ave }}</td>

    </tr>
    </tbody>
</table>
