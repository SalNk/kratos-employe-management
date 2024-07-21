@extends('layout.layout')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Salaire</h1>
            <hr class="mb-4">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-4">
                    <h3 class="section-title">Information générale</h3>
                </div>
                <div class="col-12 col-md-8">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" action={{ route('salaire.store') }} method="POST">
                                @csrf
                                @method('POST')
                                <div class="mb-3">
                                    <label for="setting-input-2" class="form-label">Employés</label>
                                    <select name="employe_id" id="employe_id" class="form-control">
                                        @foreach ($employes as $employe)
                                            <option value={{ $employe->id }}>{{ $employe->nom }}</option>
                                        @endforeach
                                        @error('employe_id')
                                            <p class="text-danger" style="font-size: 13px;">{{ $message }}</p>
                                        @enderror
                                    </select>
                                </div>
                                <div class="row mb-3 d-flex">
                                    <div class="col-md-11">
                                        <label for="setting-input-1" class="form-label">Montant</label>
                                        <input type="number" class="form-control" id="setting-input-1"
                                            placeholder="Saisir le Montant" name="montant" value={{ old('montant') }}>
                                        @error('montant')
                                            <p class="text-danger" style="font-size: 13px;">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-1">
                                        <label for="setting-input-1" class="form-label text-white">Montant</label>
                                        $
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="setting-input-1" class="form-label">Status</label>
                                        <select class="form-select w-100" name="status">
                                            <option selected value="Non payé">Non payé</option>
                                            <option value="Payé">Payé</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn app-btn-primary">Enregistrer</button>
                            </form>
                        </div><!--//app-card-body-->

                    </div><!--//app-card-->
                </div>
            </div><!--//row-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection
