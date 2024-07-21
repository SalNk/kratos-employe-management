@extends('layout.layout')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Créer un département</h1>
            <hr class="mb-4">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-4">
                    <h3 class="section-title">Information générale</h3>
                </div>
                <div class="col-12 col-md-8">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" method="POST" action='{{ route('departement.store') }}'>
                                @csrf
                                @method('post')

                                <div class="mb-3 row">
                                    <div class="col-md-9">
                                        <label for="setting-input-1" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="setting-input-1" name="name"
                                            placeholder="Saisir le Nom" value={{ old('name') }}>
                                        <div class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="setting-input-1" class="form-label">Status</label>
                                        <select class="form-select w-auto" name="status">
                                            <option selected value="Actif">Actif</option>
                                            <option value="Suspendu">Suspendu</option>
                                            <option value="En congé">En congé</option>
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
