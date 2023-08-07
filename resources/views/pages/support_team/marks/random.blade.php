<form class="ajax-update" action="{{ route('marks.update', [$exam_id, $my_class_id, $section_id, $subject_id]) }}" method="post">
    @csrf @method('put')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>ADM_NO</th>
            @if($class_type->code == 'C')
                <th>DEVOIR 1 (20)</th>
                <th>DEVOIR 2 (20)</th>
                <th>COMPOSITION  (20)</th>
            @endif
            @if($class_type->code == 'L')
                <th>DEVOIR 1 (20)</th>
                <th>DEVOIR 2 (20)</th>
                <th>COMPOSITION (20)</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($marks->sortBy('user.name') as $mk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mk->user->name }} </td>
                <td>{{ $mk->user->student_record->adm_no }}</td>

                @if($class_type->code == 'L')
                    <td><input min="1" max="20" class="w-50 text-center" name="t1_{{ $mk->id }}" value="{{ rand(1, 20) }}" type="number"></td>
                    <td><input min="1" max="20" class="w-50 text-center" name="t2_{{ $mk->id }}" value="{{ rand(1, 20) }}" type="number"></td>
                    <td><input min="1" max="20" class="w-50 text-center" name="exm_{{ $mk->id }}" value="{{ rand(1, 20) }}" type="number"></td>
                @endif

                @if($class_type->code == 'C')
                    <td><input min="1" max="20" class="w-50 text-center" name="t1_{{ $mk->id }}" value="{{ rand(1, 20) }}" type="number"></td>
                    <td><input min="1" max="20" class="w-50 text-center" name="t2_{{ $mk->id }}" value="{{ rand(1, 20) }}" type="number"></td>
                    <td><input min="1" max="20" class="w-50 text-center" name="exm_{{ $mk->id }}" value="{{ rand(1, 20) }}" type="number"></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="text-center mt-2">
        <button type="submit" class="btn btn-primary">Mettre à jour les notes <i class="icon-paperplane ml-2"></i></button>
    </div>
</form>
