<nav id="sidebar">
    <?php require 'sidebartop.php'; ?>

    <ul class="list-unstyled">
        <li>
            <a href="#smCours" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-calendar-check-o"></i> Gestion Des Cours <i class="fa fa-angle-down dropdown-toggle-after"></i></a>

            <ul class="collapse list-unstyled" id="smCours">
                <li>
                    <a href="?slug=planning">
                        <i class="fa fa-calendar"></i>
                        Planning des cours
                    </a>
                </li>
                <li>
                    <a href="?slug=horaires_ustads">
                        <i class="fa fa-clock-o"></i>
                        Horaires Ustads
                    </a>
                </li>
                <li>
                    <a href="?slug=cours">
                        <i class="fa fa-sitemap"></i>
                        Cours Des Classes
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#smClasses" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-file-text"></i> Gestion Des Classes <i class="fa fa-angle-down dropdown-toggle-after"></i></a>
            <ul class="collapse list-unstyled" id="smClasses">
                <li>
                    <a href="?slug=classes"><i class="fa fa-th-list"></i> Toutes les classes</a>
                </li>
                <li>
                    <a href="?slug=affectationsClasse"><i class="fa fa-exchange"></i> Affectations de classes</a>
                </li>
                <li>
                    <a href="?slug=classesSession"><i class="fa fa-table"></i> Classes de la Session</a>
                </li>
                <li>
                    <a href="?slug=infosClasse"><i class="fa fa-info-circle"></i> Informations</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#smRH" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users"></i> Res. Humaines <i class="fa fa-angle-down dropdown-toggle-after"></i></a>
            <ul class="collapse list-unstyled" id="smRH">
                <li>
                    <a href="#smStudys" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-address-book-o"></i> Les Étudiants <i class="fa fa-angle-down dropdown-toggle-after"></i></a>
                    <ul class="collapse list-unstyled" id="smStudys">
                        <li>
                            <a href="?slug=addEtudiant"><i class="fa fa-user-plus"></i> Nouvel Étudiant</a>
                        </li>
                        <li>
                            <a href="?slug=addEtudiant"><i class="fa fa-check-square-o"></i>Liste Des Inscrits</a>
                        </li>
                        <li>
                            <a href="?slug=addEmploye"><i class="fa fa-list"></i>Liste Des Pré-inscrits</a>
                        </li>
                        <li>
                            <a href="?slug=addEmploye"><i class="fa fa-hourglass-2"></i> Liste d'attente</a>
                        </li>
                        <li>
                            <a href="?slug=decrochages"><i class="fa fa-user-times"></i> Décrochages</a>
                        </li>
                        <li>
                            <a href="?slug=decrochages"><i class="fa fa-external-link"></i> Rétractations</a>
                        </li>
                        <li>
                            <a href="?slug=decrochages"><i class="fa fa-list-ul"></i>Liste Des Externes</a>
                        </li>
                        <li>
                            <a href="?slug=decrochages"><i class="fa fa-camera"></i> Trombinoscope</a>
                        </li>
                        <li>
                            <a href="?slug=decrochages"><i class="fa fa-drivers-license-o"></i> Tous les membres</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#smEmployes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user-md"></i> Les Employés <i class="fa fa-angle-down dropdown-toggle-after"></i></a>
                    <ul class="collapse list-unstyled" id="smEmployes">
                        <li>
                            <a href="?slug=addEmploye"><i class="fa fa-user-md"></i> Nouvel Employé</a>
                        </li>
                        <li>
                            <a href="?slug=addEtudiant"><i class="fa fa-address-book"></i> Liste Des Employés</a>
                        </li>
                        <li>
                            <a href="?slug=addEmploye"><i class="fa fa-list-ol"></i> Index Site WEB</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="?slug=addEmploye"><i class="fa fa-unlock-alt"></i> MDP provisoires</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#smVieScolaire" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-briefcase"></i> Vie Scolaire <i class="fa fa-angle-down dropdown-toggle-after"></i></a>
            <ul class="collapse list-unstyled" id="smVieScolaire">
                <li>
                    <a href="?slug=presences"><i class="fa fa-bullhorn"></i> Appels de présences</a>
                </li>
                <li>
                    <a href="?slug=absustads"><i class="fa fa-plus-square"></i> Absences Enseignants</a>
                </li>
                <li>
                    <a href="?slug=abslongues"><i class="fa fa-medkit"></i> Longues Durées</a>
                </li>
                <li>
                    <a href="?slug=abstudys"><i class="fa fa-bed"></i> Absences Étudiants</a>
                </li>
                <li>
                    <a href="?slug=absences"><i class="fa fa-newspaper-o"></i> Journal des absences</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#smEnseigne" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-graduation-cap"></i> Enseignement <i class="fa fa-angle-down dropdown-toggle-after"></i></a>
            <ul class="collapse list-unstyled" id="smEnseigne">
                <li>
                    <a href="?slug=evaluations"><i class="fa fa-line-chart"></i> Évaluations</a>
                </li>
                <li>
                    <a href="#smEnseigne1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-font"></i> Notes & Bulletins <i class="fa fa-angle-down dropdown-toggle-after"></i></a>
                    <ul class="collapse list-unstyled" id="smEnseigne1">
                        <li>
                            <a href="?slug=noteclasse"><i class="fa fa-bar-chart"></i> Notation Par Classe</a>
                        </li>
                        <li>
                            <a href="?slug=noteleve"><i class="fa fa-area-chart"></i> Notation Par Élève</a>
                        </li>
                        <li>
                            <a href="?slug=notertp"><i class="fa fa-pie-chart"></i> Notation Rattrapages</a>
                        </li>
                        <li>
                            <a href="?slug=notes"><i class="fa fa-th"></i> Tableau Des Notes</a>
                        </li>
                        <li>
                            <a href="?slug=appreciations"><i class="fa fa-flag-o"></i> Appréciations</a>
                        </li>
                        <li>
                            <a href="?slug=bulletins"><i class="fa fa-trophy"></i> Bulletins</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="?slug=sujets"><i class="fa fa-file-text-o"></i> Gestion Des Sujets</a>
                </li>
                <li>
                    <a href="?slug=examens"><i class="fa fa-gavel"></i> Gestion Des Examens</a>
                </li>
                <li>
                    <a href="?slug=tabletrp"><i class="fa fa-th-large"></i> Tableau Des Rattrapages</a>
                </li>
                <li>
                    <a href="?slug=emargements"><i class="fa fa-list-alt"></i> Emargements Papier</a>
                </li>
                <li>
                    <a href="?slug=muse"><i class="fa fa-video-camera"></i> MUSE</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#smEvents" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-calendar-o"></i> Évènements <i class="fa fa-angle-down dropdown-toggle-after"></i></a>
            <ul class="collapse list-unstyled" id="smEvents">
                <li>
                    <a href="?slug=events"><i class="fa fa-bus"></i> Listing</a>
                </li>
                <li>
                    <a href="?slug=inscriptions"><i class="fa fa-id-card-o"></i> Inscriptions</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#smCom" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-comments-o"></i> Communications <i class="fa fa-angle-down dropdown-toggle-after"></i></a>
            <ul class="collapse list-unstyled" id="smCom">
                <li>
                    <a href="?slug=tutoriels"><i class="fa fa-film"></i> Tutoriels</a>
                </li>
                <li>
                    <a href="?slug=compilateur"><i class="fa fa-steam"></i> Compilateur</a>
                </li>
                <li>
                    <a href="?slug=modeles"><i class="fa fa-clipboard"></i> Modèles Envois</a>
                </li>
                <li>
                    <a href="?slug=diffusions"><i class="fa fa-envelope"></i> Diffusion Emails</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#smFontionne" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs"></i> Fonctionnement <i class="fa fa-angle-down dropdown-toggle-after"></i></a>
            <ul class="collapse list-unstyled" id="smFontionne">
                <li>
                    <a href="?slug=calendrier"><i class="fa fa-calendar"></i> Calendrier</a>
                </li>
                <li>
                    <a href="?slug=sessions"><i class="fa fa-envira"></i> Gestion Des Sessions</a>
                </li>
                <li>
                    <a href="?slug=matieres"><i class="fa fa-flask"></i> Gestion Des Matières</a>
                </li>
                <li>
                    <a href="?slug=horaires"><i class="fa fa-clock-o"></i> Gestion Des Horaires</a>
                </li>
                <li>
                    <a href="#smSalles" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-modx"></i> Gestion Ses Salles <i class="fa fa-angle-down dropdown-toggle-after"></i></a>
                    <ul class="collapse list-unstyled" id="smSalles">
                        <li>
                            <a href="?slug=salles"><i class="fa fa-shield"></i> Salles Shatibi</a>
                        </li>
                        <li>
                            <a href="?slug=virtuelles"><i class="fa fa-television"></i> Salles Virtuelles</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="?slug=vacances"><i class="fa fa-ship"></i> Vacances Scolaires</a>
                </li>
            </ul>
        </li>
    </ul>

    <img id="iconeSHTB" src="assets/img/loader.png" alt="icone">
</nav>