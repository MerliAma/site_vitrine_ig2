# CAHIER DES CHARGES
## Refonte visuelle et amélioration UX/UI du site INTER-GROUPE

**Document de référence du projet**  
**Fichier de suivi associé :** `DECISION.md`  
**Technologies à préserver :** Laravel, PHP, Laravel Blade, Bootstrap, MySQL, HTML, CSS et JavaScript  
**Méthode de réalisation :** travail strictement organisé par lots, avec validation du commanditaire entre les lots.

---

## 1. Présentation du projet

INTER-GROUPE est un cabinet ivoirien d'ingénierie informatique et de formation professionnelle, basé à Treichville, Abidjan, et dirigé par Anet Clément Brou.

Le cabinet accompagne notamment les entreprises et les professionnels dans leurs besoins en ingénierie informatique, en formation continue et en développement des compétences.

Son agrément ou son habilitation auprès du Fonds de Développement de la Formation Professionnelle (FDFP) constitue un élément central de son positionnement. Cet aspect doit être présenté de manière professionnelle, claire et crédible, en s'appuyant exclusivement sur les informations réellement présentes et vérifiables dans le projet.

Le site existant permet de présenter le cabinet, ses domaines de formation et certains événements, de recevoir des demandes et de recueillir des messages ou suggestions. Il comporte également des pages d'authentification et un back-office.

Le projet possède déjà une architecture technique, des fonctionnalités, une base de données et une logique métier. La mission consiste à moderniser l'interface et l'expérience utilisateur sans reconstruire l'application.

## 2. Objectifs

### 2.1 Objectif général

Réaliser une refonte visuelle et ergonomique cohérente de l'ensemble du site INTER-GROUPE, du site public au back-office, en passant par l'authentification.

Le résultat attendu doit être professionnel, moderne, accessible, responsive, attractif et simple à utiliser.

### 2.2 Objectifs spécifiques

- Clarifier la présentation du cabinet et de ses activités.
- Valoriser son expertise et son positionnement lié au FDFP, sans affirmation non vérifiée.
- Faciliter la découverte des domaines et des offres de formation.
- Améliorer la présentation des événements et formations à venir.
- Simplifier les parcours de demande de formation, de demande d'information et de contact.
- Moderniser les écrans de connexion et les autres parcours d'authentification existants.
- Rendre le back-office plus lisible, cohérent et efficace.
- Améliorer le responsive design et l'accessibilité.
- Réutiliser les ressources graphiques existantes lorsqu'elles restent pertinentes.
- Documenter toutes les tâches et décisions dans `DECISION.md`.
- Préserver les fonctionnalités métier et la maintenabilité du projet.

## 3. Périmètre fonctionnel

Le périmètre exact doit être confirmé lors de l'audit du code existant. Les catégories ci-dessous constituent un inventaire à vérifier et non une autorisation de créer des fonctionnalités absentes.

### 3.1 Site public

- Page d'accueil / landing page.
- Présentation du cabinet.
- Présentation des domaines de formation.
- Pages de détail des formations, si elles existent.
- Événements et formations à venir.
- Pages d'information complémentaires existantes.
- Formulaires de demande de formation ou d'information.
- Page de contact et formulaire de suggestions.
- En-tête, navigation, pied de page et autres éléments partagés.

### 3.2 Authentification

Selon les fonctionnalités présentes :

- Connexion.
- Déconnexion et états associés.
- Mot de passe oublié.
- Réinitialisation du mot de passe.
- Inscription, si elle existe.
- Vérification de l'adresse e-mail, si elle existe.
- Autres écrans d'authentification existants.

Ne pas ajouter de nouveaux parcours d'authentification sans besoin établi et accord préalable.

### 3.3 Back-office

Inventorier puis moderniser les modules réellement présents, qui peuvent notamment concerner :

- Tableau de bord.
- Gestion des formations.
- Gestion des domaines de formation.
- Gestion des événements.
- Gestion des demandes.
- Gestion des suggestions ou messages.
- Gestion des contenus.
- Gestion des utilisateurs et des accès.
- Paramètres et autres modules existants.

Le périmètre ne doit pas être limité au tableau de bord : toutes les pages administratives identifiées lors de l'audit doivent être examinées.

## 4. Contraintes techniques obligatoires

### 4.1 Technologies à conserver

Le projet utilise :

- Laravel pour le backend.
- PHP.
- Laravel Blade pour les vues et templates.
- Bootstrap pour le framework CSS et les composants d'interface.
- MySQL pour la base de données.
- HTML, CSS et JavaScript.
- Les bibliothèques et outils déjà présents dans le projet.

Les versions exactes doivent être relevées pendant l'audit.

### 4.2 Technologies et changements interdits

Il est interdit, dans le cadre de cette refonte, de :

- Introduire React ou Next.js.
- Introduire Tailwind CSS.
- Remplacer Bootstrap par un autre framework CSS.
- Réécrire l'application dans un autre framework ou une autre architecture.
- Remplacer Laravel, PHP ou MySQL.
- Introduire une nouvelle architecture backend.
- Ajouter des dépendances uniquement pour réaliser un effet visuel simple.
- Effectuer une mise à niveau majeure de dépendances sans justification et autorisation préalables.

Si le projet utilise déjà Node.js ou un outil de compilation d'assets, son existence doit être constatée et son usage actuel préservé si nécessaire. Node.js ne doit pas devenir une nouvelle architecture applicative.

### 4.3 Principes d'implémentation

- Examiner les fichiers et leurs dépendances avant de les modifier.
- Réutiliser les layouts Blade, partials et composants existants lorsqu'ils sont adaptés.
- Utiliser des composants Blade si cela correspond à l'architecture actuelle.
- Réutiliser les composants et classes de la version de Bootstrap installée.
- Organiser les styles personnalisés et éviter leur duplication.
- Réutiliser les scripts existants lorsqu'ils conviennent.
- Éviter les modifications inutiles des contrôleurs, modèles, routes et schémas de données.
- Ne pas modifier les noms de champs ou les contrats entre les vues et les contrôleurs sans nécessité réelle.
- Ne pas supprimer de fichier sans avoir vérifié son rôle et ses dépendances.

## 5. Utilisation obligatoire des Skills fournis

Les Skills que le commanditaire fournit sont obligatoires pendant toute la mission.

Avant toute modification du code, l'intervenant doit :

1. Identifier les Skills accessibles dans l'environnement.
2. Localiser et lire leurs instructions ainsi que les ressources complémentaires qu'ils référencent.
3. Identifier leurs obligations, recommandations, interdictions et procédures.
4. Déterminer les lots auxquels chaque Skill s'applique.
5. Présenter une synthèse de leur prise en compte lors de l'audit initial.

Il est interdit de se contenter de lire le nom d'un Skill ou d'affirmer qu'il a été appliqué sans l'avoir consulté.

Si un Skill est inaccessible, incomplet ou incompatible avec une contrainte obligatoire, le problème doit être signalé avec ses conséquences. Aucune procédure ne doit être déclarée exécutée si elle ne l'a pas été.

### 5.1 Traçabilité des Skills

`DECISION.md` doit comporter une section « Skills et consignes appliqués » mentionnant, pour chaque Skill :

- Son nom.
- Les instructions pertinentes.
- Les lots concernés.
- La manière dont les consignes ont été appliquées.
- Les vérifications effectuées.
- Les exceptions ou difficultés rencontrées.

Cette section doit être mise à jour si de nouveaux Skills sont fournis ou si leur application évolue.

### 5.2 Gestion des conflits

Toute contradiction importante entre une contrainte technique, une consigne validée par le commanditaire, un Skill ou l'architecture existante doit être signalée avant l'action concernée. Aucune décision susceptible de modifier l'architecture ou le périmètre ne doit être prise silencieusement.

## 6. Direction artistique et UX/UI

### 6.1 Principes généraux

L'interface doit être professionnelle, contemporaine, accueillante et adaptée à un cabinet d'ingénierie informatique et de formation professionnelle travaillant avec des entreprises et des professionnels en Côte d'Ivoire.

Le design doit être moderne sans être surchargé, élégant sans être austère, et attractif sans nuire à la lisibilité.

Principes attendus :

- Hiérarchie visuelle claire.
- Espacements cohérents.
- Typographie lisible.
- Contrastes suffisants.
- Palette de couleurs cohérente.
- Boutons et actions faciles à identifier.
- Cartes sobres et soignées.
- Icônes homogènes et pertinentes.
- Ombres et arrondis utilisés avec modération.
- Animations discrètes et utiles.
- Navigation intuitive.
- Comportements cohérents sur toutes les pages.
- Interface adaptée aux différentes tailles d'écran.

### 6.2 Identité existante

Avant de définir une nouvelle palette, examiner le logo, les couleurs, les polices et les autres éléments d'identité existants. Préserver les éléments officiels et leur intégration lorsqu'ils sont pertinents.

Toute évolution importante de l'identité doit être justifiée et soumise à validation.

Éviter les interfaces génériques, les effets décoratifs excessifs, les animations inutiles et les compositions qui nuisent à la compréhension.

### 6.3 Accessibilité

Dans la mesure du possible, respecter les bonnes pratiques suivantes :

- Contraste suffisant entre texte et arrière-plan.
- Tailles de texte lisibles.
- Structure HTML sémantique.
- Libellés explicites pour les champs.
- Navigation au clavier.
- Indicateurs de focus visibles.
- Attributs accessibles pertinents.
- Messages d'erreur compréhensibles.
- Informations qui ne reposent pas uniquement sur la couleur.
- Respect de la préférence de réduction des animations lorsque cela s'applique.

## 7. Exigences par espace

### 7.1 Page d'accueil

Améliorer la présentation et la hiérarchie des sections réellement présentes, notamment :

- Navigation et en-tête.
- Section héro avec titre, description et appels à l'action.
- Présentation du cabinet.
- Domaines d'expertise.
- Positionnement lié au FDFP, selon les informations vérifiables.
- Domaines de formation.
- Événements ou formations à venir.
- Avantages et informations utiles.
- Appels à l'action vers les parcours existants.
- Pied de page.

Les visiteurs doivent comprendre rapidement les activités du cabinet et les prochaines actions possibles. Ne pas inventer de chiffres, témoignages, partenaires, certifications ou événements.

### 7.2 Pages de formation

Selon les pages existantes, améliorer :

- Catégories et domaines.
- Cartes de formation.
- Titres, descriptions et illustrations.
- Programmes et informations pratiques.
- Navigation entre les domaines.
- Accès aux détails et demandes.
- États vides lorsqu'aucune formation n'est disponible.

Ne pas inventer de prix ou de modalités commerciales absents du fonctionnement actuel.

### 7.3 Événements et formations à venir

Lorsque les données existent, présenter clairement :

- Intitulé.
- Date.
- Lieu ou format.
- Domaine concerné.
- Description.
- Informations publiables sur les entreprises concernées.
- Actions d'information ou d'inscription réellement prises en charge.

Distinguer les événements à venir des événements passés si cette logique existe.

### 7.4 Formulaires publics et contact

Améliorer :

- Libellés et regroupement des champs.
- Indication des champs obligatoires.
- Aides à la saisie.
- Listes déroulantes et autres contrôles.
- Boutons d'envoi.
- Messages d'erreur et de validation.
- Confirmations de réussite.
- États de chargement et d'échec lorsque nécessaires.

Conserver les validations et traitements Laravel. Un message de succès ne doit être affiché que si l'opération correspondante a réellement abouti.

Pour la page de contact, réutiliser les coordonnées existantes. Ne pas inventer d'adresse, de numéro, d'e-mail ou de réseau social.

### 7.5 Authentification

Moderniser les écrans réellement présents, en portant une attention particulière à :

- La disposition des formulaires.
- La lisibilité des champs.
- Les messages d'erreur.
- Les états de validation.
- L'affichage éventuel du mot de passe.
- Les liens de récupération de compte.
- Le responsive design.

Préserver les mécanismes Laravel, sessions, protections CSRF, autorisations et redirections existants. Ne pas contourner la sécurité pour simplifier l'interface.

### 7.6 Back-office

Moderniser l'ensemble des pages administratives réelles.

**Structure générale :**
- Navigation latérale.
- Barre supérieure.
- Menus et sous-menus.
- État actif.
- Profil et notifications, s'ils existent.
- Titres et en-têtes de page.
- Zone de contenu.
- Adaptation mobile.

**Tableau de bord :**
- Présentation claire des indicateurs réellement disponibles.
- Hiérarchie des informations.
- Données récentes utiles.
- Graphiques uniquement lorsqu'ils ont une utilité réelle.

Ne pas inventer de statistiques ou de données de démonstration en production.

**Tableaux et listes :**
- En-têtes et alignement.
- Lisibilité et densité visuelle.
- Statuts.
- Recherche et filtres existants.
- Pagination.
- Actions de consultation, modification et suppression.
- États vides et chargement.
- Confirmation des actions sensibles.

**Formulaires administratifs :**
- Organisation des champs.
- Libellés et aides.
- Messages d'erreur.
- Boutons d'action cohérents.
- Respect des validations, relations et opérations CRUD existantes.

Les menus et actions doivent respecter les permissions déjà en place.

## 8. Images et ressources graphiques

Les images déjà présentes doivent être conservées et réutilisées lorsqu'elles sont pertinentes.

Avant de remplacer une image, examiner son contenu, sa qualité, son usage et son emplacement.

De nouvelles images peuvent être générées avec NanoBanana lorsqu'elles répondent à un besoin visuel précis, par exemple :

- Illustration de la section héro.
- Illustration d'un domaine de formation.
- Mise en scène de professionnels en formation.
- Illustration de l'ingénierie informatique ou de l'accompagnement des entreprises.

Pour chaque image proposée, préciser :

- Son objectif.
- Son emplacement.
- Son format et ses dimensions recommandées.
- Le prompt de génération NanoBanana.

Si l'environnement permet réellement de générer des images, cet outil peut être utilisé lorsque cela est pertinent. Sinon, fournir le prompt sans prétendre que l'image a été créée.

Les images représentant des personnes ou des environnements locaux doivent rester crédibles et professionnelles. Éviter les scènes incohérentes, les textes intégrés illisibles et les stéréotypes.

Veiller aux proportions, au poids des fichiers et aux performances. Ne pas remplacer toutes les images existantes sans justification.

## 9. Préservation de la logique métier et de la sécurité

La refonte est principalement visuelle et ergonomique. Les éléments suivants doivent être préservés autant que possible :

- Routes Laravel.
- Contrôleurs.
- Modèles et relations.
- Vues Blade et données attendues.
- Migrations et structure MySQL.
- Règles de validation.
- Authentification, sessions et autorisations.
- Opérations CRUD.
- Recherches, filtres et pagination.
- Traitements de formulaires.
- Téléchargements et notifications.
- Interactions JavaScript nécessaires.
- Protections de sécurité existantes.

Aucune migration destructive, suppression de données ou modification risquée ne doit être exécutée sans justification et autorisation explicites.

Toute modification fonctionnelle rendue nécessaire par un changement visuel doit être documentée et limitée au strict nécessaire. Si elle dépasse le périmètre autorisé, demander l'accord du commanditaire.

## 10. Méthode de réalisation par lots

Le travail suit obligatoirement le cycle :

**Analyser → Planifier → Obtenir l'accord → Exécuter → Vérifier → Documenter → Présenter le bilan → Attendre l'autorisation suivante.**

L'autorisation d'un lot ne vaut pas autorisation du lot suivant.

Avant chaque lot, présenter :

- Objectif.
- Tâches et identifiants.
- Fichiers ou composants concernés.
- Skills applicables.
- Dépendances.
- Risques de régression.
- Critères d'acceptation.
- Tests prévus.

Pendant le lot, rester dans le périmètre autorisé et mettre à jour `DECISION.md` après chaque tâche significative.

À la fin, présenter les tâches terminées, en attente ou bloquées, les fichiers modifiés, les tests et leurs résultats, les problèmes et les points restant à traiter. Attendre ensuite l'autorisation explicite du commanditaire.

### Lot 1 — Audit et préparation

- Lire les Skills.
- Lire ou créer `DECISION.md`.
- Identifier les versions et l'architecture.
- Inventorier routes, vues Blade, layouts, composants, CSS, JavaScript et images.
- Inventorier les pages publiques, d'authentification et du back-office.
- Identifier les fonctionnalités, validations, permissions et tests existants.
- Relever les incohérences visuelles et difficultés d'utilisation.
- Proposer une direction artistique et un plan de lots.
- Documenter les constats et risques.

**Limite :** ne pas lancer la refonte générale pendant l'audit. Attendre l'autorisation du lot 2.

### Lot 2 — Système de design et composants partagés

- Définir palette, typographie, espacements et styles.
- Harmoniser boutons, champs, cartes, alertes, badges et modales.
- Organiser les styles personnalisés.
- Adapter les composants partagés.
- Vérifier les effets de bord sur les pages qui les utilisent.

### Lot 3 — Site public

- Moderniser la page d'accueil.
- Améliorer les pages de présentation et de formation.
- Moderniser les événements et autres pages publiques existantes.
- Vérifier les liens, routes, contenus dynamiques et le responsive.

### Lot 4 — Demandes et contact

- Moderniser les formulaires publics.
- Améliorer validation, erreurs, confirmations et états de chargement.
- Vérifier les traitements et l'enregistrement des données.

### Lot 5 — Authentification

- Moderniser les écrans d'authentification existants.
- Préserver les mécanismes de sécurité et les parcours fonctionnels.
- Vérifier les messages et les redirections.

### Lot 6 — Structure du back-office et tableau de bord

- Moderniser la navigation administrative.
- Harmoniser le layout partagé.
- Améliorer le tableau de bord à partir des données réelles.
- Vérifier le responsive et les permissions.

### Lot 7 — Pages de gestion du back-office

- Moderniser les tableaux, listes et formulaires.
- Améliorer les filtres, recherches, statuts et paginations existants.
- Vérifier les actions et les opérations CRUD.
- Préserver les règles métier.

### Lot 8 — Illustrations, finitions et accessibilité

- Ajouter uniquement les illustrations justifiées.
- Harmoniser les détails visuels.
- Améliorer les micro-interactions utiles.
- Contrôler l'accessibilité et le responsive.

### Lot 9 — Vérification finale

- Contrôler routes, formulaires, validations et messages.
- Vérifier les accès et permissions.
- Contrôler les opérations métier et les contenus dynamiques.
- Examiner les erreurs JavaScript et de rendu détectables.
- Exécuter les tests pertinents.
- Contrôler les différentes tailles d'écran.
- Documenter les régressions, limites et tests non exécutés.
- Présenter un bilan global.

Les lots peuvent être ajustés à partir de l'audit, mais toute modification de leur périmètre doit être expliquée et documentée. Aucun lot ne peut être exécuté sans autorisation.

## 11. Gestion obligatoire de DECISION.md

`DECISION.md` doit être situé à la racine du projet.

S'il existe déjà, il faut le lire et préserver les décisions antérieures toujours valides. S'il n'existe pas, le créer avant les modifications de code.

Il doit contenir au minimum :

1. Contexte et objectifs.
2. Contraintes techniques.
3. Architecture constatée.
4. Inventaire des pages et fonctionnalités.
5. Skills et consignes appliqués.
6. Direction artistique.
7. Plan et statut des lots.
8. Journal détaillé des tâches.
9. Décisions techniques et visuelles.
10. Fichiers créés, modifiés ou supprimés.
11. Tests et résultats.
12. Problèmes et régressions.
13. Points en attente de validation.
14. État actuel.
15. Prochaines étapes autorisées.

### Journal des tâches

Attribuer à chaque tâche un identifiant unique et stable, par exemple `AUDIT-001`, `DESIGN-001`, `PUBLIC-001`, `AUTH-001`, `ADMIN-001` ou `TEST-001`.

Chaque entrée doit préciser :

- Identifiant et lot.
- Objectif.
- Statut.
- Fichiers concernés.
- Travail réellement effectué.
- Décisions et justification.
- Skills appliqués.
- Tests exécutés et résultats.
- Difficultés ou régressions.
- Travail restant.

Statuts autorisés :

- `À faire`
- `En cours`
- `En attente`
- `Bloqué`
- `Terminé`
- `Validé`

Une tâche peut être techniquement `Terminée` sans être `Validée` par le commanditaire. Ne pas utiliser `Validé` sans accord humain lorsqu'il est requis.

Mettre le fichier à jour après chaque tâche significative, et vérifier sa cohérence avant le bilan de fin de lot. Ne jamais inventer des résultats de test ou réécrire l'historique pour masquer un échec.

## 12. Vérification et critères d'acceptation

Une tâche ne peut être considérée comme terminée que si :

1. Le changement prévu a réellement été réalisé.
2. Les Skills applicables ont été respectés.
3. Les fichiers modifiés ont été vérifiés.
4. Les fonctionnalités concernées ont été contrôlées.
5. Les tests prévus ont été exécutés, ou l'impossibilité de les exécuter est documentée.
6. Les régressions connues ont été corrigées ou signalées.
7. `DECISION.md` a été mis à jour.
8. Les limites restantes sont clairement indiquées.

Le rendu visuel et le fonctionnement doivent tous deux être contrôlés. Une interface attrayante qui casse une fonctionnalité n'est pas acceptable.

Ne pas exécuter de commandes destructives ni modifier des données de production pour tester. Ne pas déclarer un test réussi sans l'avoir exécuté. Les tests non exécutés doivent être identifiés comme tels.

## 13. Livrables attendus

### À chaque lot

- Compte rendu du lot.
- Liste des tâches et statuts.
- Liste des fichiers créés ou modifiés.
- Décisions et Skills appliqués.
- Résultats des tests exécutés.
- Problèmes, régressions et limites.
- Mise à jour de `DECISION.md`.
- Prochaines étapes proposées, sans les exécuter avant autorisation.

### À la fin du projet

- Bilan des pages couvertes.
- Bilan des composants réutilisables.
- Résumé des décisions visuelles.
- Liste des fichiers importants modifiés.
- Résultats des tests.
- Limites et points restant à traiter.
- État final des lots dans `DECISION.md`.

## 14. Instruction de démarrage

La première intervention doit se limiter au **Lot 1 — Audit et préparation**.

Ordre de travail obligatoire :

1. Repérer et lire les Skills fournis.
2. Lire `DECISION.md` s'il existe.
3. Examiner l'architecture Laravel, les vues Blade et les assets.
4. Inventorier les pages publiques, d'authentification et du back-office.
5. Identifier les composants réutilisables et les ressources graphiques.
6. Relever les problèmes visuels, ergonomiques et les risques.
7. Proposer une direction artistique et le plan détaillé des lots.
8. Mettre à jour `DECISION.md` avec les constats réellement établis.
9. Présenter le compte rendu d'audit.
10. Attendre mon autorisation avant de commencer le lot 2.

**Aucune modification générale de l'interface ne doit être entreprise pendant le lot 1. Aucune étape ultérieure ne doit être lancée sans mon autorisation explicite.**

La priorité absolue est de moderniser l'ensemble du site INTER-GROUPE tout en préservant Laravel, Blade, Bootstrap, PHP, MySQL, la logique métier existante et les consignes obligatoires des Skills fournis.
