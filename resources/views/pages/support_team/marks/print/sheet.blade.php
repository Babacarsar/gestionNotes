{{--<!--NAME , CLASS AND OTHER INFO -->--}}
<table style="width:100%; border-collapse:collapse; ">
    <tbody>
    <tr>
        <td><strong>PRENOM ET NOM:</strong> {{ strtoupper($sr->user->name) }}</td>
        <td><strong>MATRICULE:</strong> {{ $sr->adm_no }}</td>
        <td><strong>CLASS:</strong> {{ strtoupper($my_class->name) }}</td>
    </tr>
    <tr>
        <td><strong>BULLETIN DE NOTE DU </strong> {!! strtoupper(Mk::getSuffix($ex->term)) !!} SEMESTRE</td>
        <td><strong>ANNEE ACADEMIQUE:</strong> {{ $ex->year }}</td>
        <td><strong>DATE DE NAISSANCE :</strong> {{ $sr->age ?: ($sr->user->dob ? date_diff(date_create($sr->user->dob), date_create('now'))->y : '-') }}</td>
    </tr>

    </tbody>
</table>
<!--Exam Table-->
<table style="width:100%; border-collapse:collapse; border: 1px solid #000; margin: 10px auto;" border="1">
    <thead>
        <tr>
            <th rowspan="2">MATIERE</th>
            <th>ÉVALUATION CONTINUE</th>
            <th rowspan="2">COMPOSITION<br>(20)</th>
            <th rowspan="2">MOYENNE<br>(20)</th>
            <th rowspan="2">COEFFICIENT</th>
            <th rowspan="2">MOYENNE x</th>
            <th rowspan="2">RANG <br> MATIERE </th>
            <th rowspan="2">APPRECIATION</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $sub)
        <tr>
            <td style="font-weight: bold">{{ $sub->name }}</td>
            @foreach($marks->where('subject_id', $sub->id)->where('exam_id', $ex->id) as $mk)
                <td>{{ $mk->tca ?: '-' }}</td>
                <td>{{ $mk->exm ?: '-' }}</td>
                <td>{{ $mk->tca2 ?: '-' }}</td>
                <td>{{ $sub->coefficient }}</td>
                <td>{{ $mk->$tex ?: '-'}}</td>
                <td>{{ $mk->sub_pos ?: '-'}}</td>
                <td>{{ $mk->grade ? $mk->grade->remark : '-' }}</td>
            @endforeach
        </tr>
        @endforeach
        <tr>
            <td colspan="2"><strong>TOTAL POINTS : </strong> {{ $exr->total }}</td>
            <td colspan="3"><strong>MOYENNE FINALE: </strong> {{ $exr->ave }}</td>
            <td colspan="3"><strong> RANG : </strong> {{ $exr->pos }}</td>
        </tr>
    </tbody>
</table>
