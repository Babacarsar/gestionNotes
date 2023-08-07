<form class="ajax-update" action="{{ route('marks.update', [$exam_id, $my_class_id, $section_id, $subject_id]) }}" method="post">
    @csrf @method('put')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>IDENTIFIANT</th>
            @if($class_type->code == 'L')
                <th>DEVOIR 1 (20)</th>
                <th>DEVOIR 2 (20)</th>
                <th>COMPOSITION (20)</th>
            @endif
            @if($class_type->code == 'C')
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
    <td><input title="DEVOIR 1" min="1" max="20" class="text-center" name="t1_{{ $mk->id }}" value="{{ $mk->t1 }}" type="number" step="0.01"></td>
    <td><input title="DEVOIR 2" min="1" max="20" class="text-center" name="t2_{{ $mk->id }}" value="{{ $mk->t2 }}" type="number" step="0.01"></td>
    <td><input title="COMPOSITION" min="1" max="20" class="text-center" name="exm_{{ $mk->id }}" value="{{ $mk->exm }}" type="number" step="0.01"></td>
@endif

@if($class_type->code == 'C')
    <td><input title="DEVOIR 1" min="1" max="20" class="text-center" name="t1_{{ $mk->id }}" value="{{ $mk->t1 }}" type="number" step="0.01"></td>
    <td><input title="DEVOIR 2" min="1" max="20" class="text-center" name="t2_{{ $mk->id }}" value="{{ $mk->t2 }}" type="number" step="0.01"></td>
    <td><input title="COMPOSITION" min="1" max="20" class="text-center" name="exm_{{ $mk->id }}" value="{{ $mk->exm }}" type="number" step="0.01"></td>
@endif


            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="text-center mt-2">
        <button type="submit" class="btn btn-primary">Metttre à jour la notes <i class="icon-paperplane ml-2"></i></button>
    </div>
</form>
