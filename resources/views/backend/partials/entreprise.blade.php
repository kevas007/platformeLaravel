<div class="container">
    <div class="row">
        @foreach ($entreprise as $item)
        <div class="col-md-6">
            <div class="card w-75">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Entreprise</h5>
                        <a href="/tache/" class="btn btn-primary">+</a>
                    </div>
                    <p class="card-text">
                    {{-- <div class="row"> --}}

                            <p>Nom : {{ $item->nom_de_entreprise}}</p>
                            <p>Activité : {{ $item->activite_d_entreprise}}</p>
                            <p>Adresse : {{ $item->adresse }}</p>
                            <p>Email : {{ $item->email }}</p>
                            <p>Telephone : {{ $item->numero_fixe }}</p>
                            <p>
                                Email Personne de Contact : {{ $item->email_de_la_personne_de_contact}}
                            </p>
                            <p>
                                Nom Personne de Contact : {{ $item->nom_de_la_personne_de_contact}}
                            </p>
                            <p>
                                Numero Personne de Contact : {{ $item->numero_de_la_personne_de_contact}}
                            </p>

                    {{-- </div> --}}

                    </p>
                   <div >

                    <a href="/show/{{ $item->id }}" class="btn btn-warning">More...</a>
                   </div>
                </div>
            </div>


        </div>
                @endforeach
    </div>
</div>

