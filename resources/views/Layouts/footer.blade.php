<footer class="mt-4" role="contentinfo">
    <div class="row foot1 mx-0 py-4 px-3 px-md-5">
        <div class="col-12 col-md-4 mb-3 mb-md-0">
            <h5 class="text-uppercase mb-3" style="color: var(--ig-secondary, #1A3A6B); font-family: var(--ig-font-heading); font-weight: 700; font-size: 1rem;">
                INTER-GROUPE
            </h5>
            <p class="mb-2" style="font-size: 0.875rem; color: var(--ig-text-muted, #64748B); line-height: 1.6;">
                Cabinet d'ingénierie informatique et de formation professionnelle continue agréé FDFP.
            </p>
            <p class="mb-0" style="font-size: 0.875rem; color: var(--ig-text-muted, #64748B);">
                <i class="ion-ios-location mr-1" aria-hidden="true"></i> Treichville, Abidjan — Côte d'Ivoire
            </p>
        </div>

        <div class="col-12 col-md-4 mb-3 mb-md-0">
            <h5 class="text-uppercase mb-3" style="color: var(--ig-secondary, #1A3A6B); font-family: var(--ig-font-heading); font-weight: 700; font-size: 1rem;">
                Navigation rapide
            </h5>
            <ul class="menubas pl-0 mb-0">
            @if(isset($idEnt))
                <li><a href="{{route('quitter','idEnt='.$idEnt.'&page=Ac')}}"><i class="ion-ios-arrow-forward mr-1" aria-hidden="true"></i> Accueil</a></li>
                <li><a href="{{route('quitter','idEnt='.$idEnt.'&page=present')}}"><i class="ion-ios-arrow-forward mr-1" aria-hidden="true"></i> Présentation</a></li>
                <li><a href="{{route('quitter','idEnt='.$idEnt.'&page=domF')}}"><i class="ion-ios-arrow-forward mr-1" aria-hidden="true"></i> Formations</a></li>
                <li><a href="{{route('quitter','idEnt='.$idEnt.'&page=dev')}}"><i class="ion-ios-arrow-forward mr-1" aria-hidden="true"></i> Développement</a></li>
                <li><a href="{{route('quitter','idEnt='.$idEnt.'&page=cont')}}"><i class="ion-ios-arrow-forward mr-1" aria-hidden="true"></i> Contact</a></li>
            @else
                <li><a href="{{route('accueil')}}"><i class="ion-ios-arrow-forward mr-1" aria-hidden="true"></i> Accueil</a></li>
                <li><a href="{{route('presentation')}}"><i class="ion-ios-arrow-forward mr-1" aria-hidden="true"></i> Présentation</a></li>
                <li><a href="{{route('formation')}}"><i class="ion-ios-arrow-forward mr-1" aria-hidden="true"></i> Formations</a></li>
                <li><a href="{{route('developpement')}}"><i class="ion-ios-arrow-forward mr-1" aria-hidden="true"></i> Développement</a></li>
                <li><a href="{{route('contact')}}"><i class="ion-ios-arrow-forward mr-1" aria-hidden="true"></i> Contact</a></li>
            @endif
            </ul>
        </div>

        <div class="col-12 col-md-4">
            <h5 class="text-uppercase mb-3" style="color: var(--ig-secondary, #1A3A6B); font-family: var(--ig-font-heading); font-weight: 700; font-size: 1rem;">
                Contact direct
            </h5>
            <ul class="pl-0 mb-0" style="list-style: none; font-size: 0.875rem; line-height: 2;">
                <li><i class="ion-ios-telephone mr-2" aria-hidden="true"></i> <strong>Téléphone :</strong> (+225) 27-21-25-05-24</li>
                <li><i class="ion-ios-email mr-2" aria-hidden="true"></i> <strong>Email :</strong> <a href="mailto:infos@intergroupe-ci.com">infos@intergroupe-ci.com</a></li>
                <li><i class="ion-ios-paperplane mr-2" aria-hidden="true"></i> <strong>Boîte Postale :</strong> 08 BP 1697 Abidjan 08</li>
                <li><i class="ion-ios-checkmark-circle mr-2" style="color: var(--ig-primary);" aria-hidden="true"></i> Habilitation FDFP n° 0039</li>
            </ul>
        </div>
    </div>

    <div class="row foot2 mx-0 py-3 px-3 px-md-5 align-items-center">
        <div class="col-12 col-md-6 text-center text-md-left mb-2 mb-md-0">
            <p class="mb-0">
                &copy; {{ date('Y') }} <strong>INTER-GROUPE</strong>. Tous droits réservés.
            </p>
        </div>
        <div class="col-12 col-md-6 text-center text-md-right">
            <ul class="d-inline-flex list-unstyled mb-0 align-items-center justify-content-center justify-content-md-end">
                <li class="mr-2">
                    <a href="https://fr-fr.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Suivez INTER-GROUPE sur Facebook">
                        <i class="ion-social-facebook" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="mr-2">
                    <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer" aria-label="Suivez INTER-GROUPE sur Twitter">
                        <i class="ion-social-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Suivez INTER-GROUPE sur Instagram">
                        <i class="ion-social-instagram" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>