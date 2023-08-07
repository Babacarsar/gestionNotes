@extends('layouts.master')
@section('page_title', 'Gestion des paramètres du système')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-semibold">Mettre à jour les parmètres du système </h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <form enctype="multipart/form-data" method="post" action="{{ route('settings.update') }}">
                @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 border-right-2 border-right-blue-400">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Nom de l'école <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="system_name" value="{{ $s['system_name'] }}" required type="text" class="form-control" placeholder="Nom de l'école">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="current_session" class="col-lg-3 col-form-label font-weight-semibold">session actuelle <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select data-placeholder="Choisir..." required name="current_session" id="current_session" class="select-search form-control">
                                    <option value=""></option>
                                    @for($y = date('Y', strtotime('- 2 years')); $y <= 2030; $y++)
                                        <option {{ ($s['current_session'] == $y.'-'.($y+1)) ? 'selected' : '' }}>{{ $y.'-'.($y+1) }}</option>
                                    @endfor


                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Acronyme de l'école</label>
                            <div class="col-lg-9">
                                <input name="system_title" value="{{ $s['system_title'] }}" type="text" class="form-control" placeholder="Acronyme">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Phone</label>
                            <div class="col-lg-9">
                                <input name="phone" value="{{ $s['phone'] }}" type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold"> Email de l'école</label>
                            <div class="col-lg-9">
                                <input name="system_email" value="{{ $s['system_email'] }}" type="email" class="form-control" placeholder="Email de l'école">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Addresse de l'école <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input required name="address" value="{{ $s['address'] }}" type="text" class="form-control" placeholder="Adresse de l'école">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Fin du semestre</label>
                            <div class="col-lg-6">
                                <input name="term_ends" value="{{ $s['term_ends'] }}" type="text" class="form-control date-pick" placeholder="Date de fin de sem">
                            </div>
                            <div class="col-lg-3 mt-2">
                                <span class="font-weight-bold font-italic">M-J-A ou M/J/A </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Date de debut prochain semestre</label>
                            <div class="col-lg-6">
                                <input name="term_begins" value="{{ $s['term_begins'] }}" type="text" class="form-control date-pick" placeholder="Date de debut prochain semestre">
                            </div>
                            <div class="col-lg-3 mt-2">
                                <span class="font-weight-bold font-italic">M-J-A ou M/J/A </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lock_exam" class="col-lg-3 col-form-label font-weight-semibold">Verrouiller l'examen</label>
                            <div class="col-lg-3">
                                <select class="form-control select" name="lock_exam" id="lock_exam">
                                    <option {{ $s['lock_exam'] ? 'selected' : '' }} value="1">oui</option>
                                    <option {{ $s['lock_exam'] ?: 'selected' }} value="0">Non</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                    <span class="font-weight-bold font-italic text-info-800">Le code PIN sera nécessaire pour afficher les résultats si le verrouillage de l'examen est défini</span>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                


                    {{--Logo--}}
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Change Logo:</label>
                        <div class="col-lg-9">
                            <div class="mb-3">
                                <img style="width: 100px" height="100px" src="{{ $s['logo'] }}" alt="">
                            </div>
                            <input name="logo" accept="image/*" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                        </div>
                    </div>
                </div>
            </div>


                <div class="text-right">
                    <button type="submit" class="btn btn-danger">Valider <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>

    {{--Settings Edit Ends--}}

@endsection
