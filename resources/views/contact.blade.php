@extends('Layouts/baseHTML',['title'=>'Contact & Localisation'])

@section('corps')
<div class="col-lg-8 col-md-8 col-12 public-main-col">

    <!-- EN-TÊTE DE PAGE -->
    <div class="mb-4">
        <h1 class="hero-title" style="font-size: 1.85rem;">
            Contactez INTER-GROUPE
        </h1>
        <p class="hero-lead mb-0">
            Notre équipe est à votre disposition à Treichville pour toute question relative à nos formations professionnelles et nos prestations informatiques.
        </p>
    </div>

    <!-- MESSAGES D'ALERTE -->
    @if(isset($info2))
        <div class="alert alert-danger alert-dismissible fade show border-left-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-circle fa-2x mr-3 text-danger" aria-hidden="true"></i>
                <div>
                    <h2 class="h6 font-weight-bold mb-1">Message</h2>
                    <p class="mb-0 small">{{ $info2 }}</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(request()->has('info'))
        <div class="alert alert-success alert-dismissible fade show border-left-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle fa-2x mr-3 text-success" aria-hidden="true"></i>
                <div>
                    <h2 class="h6 font-weight-bold mb-1">Succès</h2>
                    <p class="mb-0 small">{{ request()->get('info') }}</p>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- CONTENU PRINCIPAL : 2 COLONNES (INFOS & FORMULAIRE) -->
    <div class="row mb-4">
        
        <!-- COLONNE GAUCHE : COORDONNÉES OFFICIELLES -->
        <div class="col-lg-5 col-md-5 mb-4 mb-md-0">
            <div class="contact-info-card h-100">
                <h2 class="h5 font-weight-bold text-secondary mb-3 pb-2 border-bottom">
                    Coordonnées
                </h2>

                <div class="contact-info-item">
                    <div class="contact-icon-bubble">
                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    </div>
                    <div>
                        <strong class="text-secondary d-block font-weight-bold">Adresse du Cabinet</strong>
                        <p class="small text-muted mb-0">
                            Treichville Avenue 1<br/>
                            Résidence PONT DE GAULLE, Escalier A, 1er Étage, Porte A/1<br/>
                            08 BP 1697 Abidjan 08, Côte d'Ivoire
                        </p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-icon-bubble">
                        <i class="fas fa-phone-alt" aria-hidden="true"></i>
                    </div>
                    <div>
                        <strong class="text-secondary d-block font-weight-bold">Téléphone</strong>
                        <p class="small text-muted mb-0">
                            <a href="tel:+2252721250524" class="text-dark font-weight-bold">
                                (+225) 27-21-25-05-24
                            </a>
                        </p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-icon-bubble">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div>
                        <strong class="text-secondary d-block font-weight-bold">Courrier Électronique</strong>
                        <p class="small text-muted mb-0">
                            <a href="mailto:infos@intergroupe-ci.com" class="text-dark font-weight-bold">
                                infos@intergroupe-ci.com
                            </a>
                        </p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-icon-bubble">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                    </div>
                    <div>
                        <strong class="text-secondary d-block font-weight-bold">Heures d'Ouverture</strong>
                        <p class="small text-muted mb-0">
                            Lundi &ndash; Vendredi : 08h00 à 17h00<br/>
                            Samedi &ndash; Dimanche : Fermé
                        </p>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top text-center">
                    <span class="small text-muted d-block mb-2">Besoin d'un devis ou d'une prestation ?</span>
                    <a href="{{route('dmdPrestation')}}" class="btn btn-outline-primary btn-sm btn-block">
                        <i class="fas fa-laptop-code mr-1" aria-hidden="true"></i> Demander une prestation
                    </a>
                </div>
            </div>
        </div>

        <!-- COLONNE DROITE : FORMULAIRE SUGGESTIONS / AVIS -->
        <div class="col-lg-7 col-md-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h2 class="h5 font-weight-bold text-secondary mb-1">
                        Envoyez-nous vos avis et suggestions
                    </h2>
                    <p class="small text-muted mb-3">
                        Vos retours contribuent à l'amélioration continue de nos programmes de formation.
                    </p>

                    <form method="post" action="{{route('SugCont')}}">
                        @csrf 
                        <div class="form-group mb-3">
                            <label for="inputNomSug" class="small font-weight-bold text-secondary">
                                Nom et Prénom(s) <span class="required-star text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="inputNomSug" placeholder="Ex. Koffi Jean-Marc" name="nomSug" required="required" value="{{old('nomSug')}}">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label for="inputMailSug" class="small font-weight-bold text-secondary">
                                    Adresse Email
                                </label>
                                <input type="email" class="form-control" id="inputMailSug" placeholder="nom@entreprise.ci" name="mailSug" value="{{old('mailSug')}}">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="inputTelSug" class="small font-weight-bold text-secondary">
                                    Numéro de Téléphone
                                </label>
                                <input type="tel" class="form-control" id="inputTelSug" placeholder="0700000000" name="telSug" value="{{old('telSug')}}">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="inputMsgSug" class="small font-weight-bold text-secondary">
                                Message ou Suggestion <span class="required-star text-danger">*</span>
                            </label>
                            <textarea class="form-control" id="inputMsgSug" rows="4" placeholder="Exprimez votre avis, vos observations ou vos attentes..." name="msgSug" required="required">{{old('msgSug')}}</textarea>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary px-4 shadow-sm" name="validSug">
                                <i class="fas fa-paper-plane mr-2" aria-hidden="true"></i> Envoyer mon message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- CARTE GOOGLE MAPS -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3 border-bottom">
            <h2 class="h6 font-weight-bold text-secondary mb-0">
                <i class="fas fa-map-marked-alt text-primary mr-2" aria-hidden="true"></i> Plan d'Accès &bull; Treichville, Abidjan
            </h2>
        </div>
        <div class="card-body p-0">
            <div class="contact-map-wrapper mb-0 rounded-0 border-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.6835083711567!2d-4.012403799999998!3d5.311978300000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1ebc3ed8a44d1%3A0x75aed55330be96b9!2sPalais+de+la+Culture!5e0!3m2!1sfr!2sci!4v1442785288463" width="100%" height="340" frameborder="0" style="border:0;" allowfullscreen="" aria-label="Localisation du cabinet INTER-GROUPE à Treichville"></iframe>
            </div>
        </div>
    </div>

</div>
@endsection