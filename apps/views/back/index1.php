<?php
ControlAccess([1]);



$Title = $Description = 'Interface Administrateur';
require '../views/header.php';
?>

<?php require 'sidebar1.php'; ?>

<div class="container-fluid">
    <?php require 'navbartop.php'; ?>

    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 cols-xs-12">
            <div class="card-header">
                <div class="dropleft pull-right">
                    <a class="btn-dropdown dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                            Action 1
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            Action 2
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-clipboard" aria-hidden="true"></i>
                            Action 3
                        </a>
                    </div>
                </div>

                <div class="card-title">Modèle de formulaire</div>
                <div class="card-subtitle">Informations</div>

            </div>

            <form action="#" method="POST" class="card">
                <div class="card-body">
                    <div class="form-row mb-1">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-label" style="margin-top: 4px !important;">Civilité</div>
                            <table style="width: 100%; table-layout: fixed;">
                                <tr>
                                    <td class="text-center" style="padding : 5px 0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="1" id="madame" name="genreMembre" <?= isset($_POST['genreMembre']) && $_POST['genreMembre'] == 1 ? 'checked' : ''; ?> aria-describedby="Civilité">
                                            <label class="form-check-label ml-1" for="madame">
                                                <span class="pointer ml-1">Mme</span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-center" style="padding : 5px 0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="2" id="monsieur" name="genreMembre" <?= isset($_POST['genreMembre']) && $_POST['genreMembre'] == 2 ? 'checked' : ''; ?> aria-describedby="Civilité">
                                            <label class="form-check-label ml-1" for="monsieur">
                                                <span class="pointer ml-1">Mr</span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="invalid-feedback" style="display: block;">
                                <?= $error['genreMembre'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="idMembre">Identifiant</label>
                            <input type="text" class="form-control text-center" id="idMembre" name="idMembre" value="<?= $_POST['idMembre'] ?? ''; ?>" onfocus="blur()" style="background: #f8f8f8; color: #d00; letter-spacing: 3px; font-weight: 500; font-size: 19pt; height: 40px;">
                        </div>
                    </div>

                    <div class="form-row mb-1">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="nomMembre">Nom</label>
                            <input type="text" class="form-control is-<?= isset($error['nomMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="nomMembre" name="nomMembre" value="<?= $_POST['nomMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['nomMembre'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="prenomMembre">Prénom</label>
                            <input type="text" class="form-control is-<?= isset($error['prenomMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="prenomMembre" name="prenomMembre" value="<?= $_POST['prenomMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['prenomMembre'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mb-1">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="naissanceMembre">Date de naissance</label>
                            <input type="date" class="form-control text-center is-<?= isset($error['naissanceMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="naissanceMembre" name="naissanceMembre" value="<?= $_POST['naissanceMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['naissanceMembre'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label" for="mobileMembre">N° de mobile</label>
                            <input type="text" class="form-control text-center is-<?= isset($error['mobileMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="mobileMembre" name="mobileMembre" value="<?= $_POST['mobileMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['mobileMembre'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($_SERVER['QUERY_STRING'] == 'slug=profil') : ?>
                        <input type="hidden" name="levelsMembre" value="<?= implode(',', $_SESSION['Logged']['levelsMembre']); ?>">
                        <input type="hidden" name="idMembre_1" value="<?= $_SESSION['Logged']['idMembre_1']; ?>">
                        <?php if ($_SESSION['Logged']['age'] < 18) : ?>
                            rattachement & lien parenté
                        <?php endif; ?>
                    <?php else : ?>

                    <?php endif; ?>

                    <div class="mb-1">
                        <label class="form-label" for="emailMembre">Email</label>
                        <input type="text" class="form-control is-<?= isset($error['emailMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="emailMembre" name="emailMembre" value="<?= $_POST['emailMembre'] ?? ''; ?>">
                        <div class="invalid-feedback">
                            <?= $error['emailMembre'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="adresseMembre">Adresse</label>
                        <input type="text" class="form-control is-<?= isset($error['adresseMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="adresseMembre" name="adresseMembre" value="<?= $_POST['adresseMembre'] ?? ''; ?>">
                        <div class="invalid-feedback">
                            <?= $error['adresseMembre'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-row mb-1">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <label class="form-label" for="cpMembre">Code postal</label>
                            <input type="text" class="form-control is-<?= isset($error['cpMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="cpMembre" name="cpMembre" value="<?= $_POST['cpMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['cpMembre'] ?? ''; ?>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <label class="form-label" for="villeMembre">Ville</label>
                            <input type="text" class="form-control is-<?= isset($error['villeMembre']) ? 'invalid' : (isset($_POST['subFormProfil']) ? 'valid' : ''); ?>" id="villeMembre" name="villeMembre" value="<?= $_POST['villeMembre'] ?? ''; ?>">
                            <div class="invalid-feedback">
                                <?= $error['villeMembre'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="#" class="btn btn-sm btn-danger" onclick="sweetAlert('Vous confirmez ?', 'La supression de ce versement sera définitive !', '?slug=', 'warning')"><i class="bi bi-trash-fill"></i>Supprimer</a>

                    <a href="?slug=" class="btn btn-sm btn-secondary" onclick="Processing()">Annuler</a>

                    <button type="submit" class="btn btn-sm btn-primary" name="subFormProfil" onclick="Processing()">Valider</button>
                </div>
            </form>
        </div>

        <div class="col-lg-8 col-md-12 col-sm-12 cols-xs-12">
            <div class="card-header">
                <div class="card-title">Modèle de tableau</div>
                <div class="card-subtitle">Listing</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="TAB_Example" class="table table-sm table-bordered table-striped table-hover">
                            <thead>
                                <tr class="grady-orange">
                                    <th>Nom</th>
                                    <th>Fonction</th>
                                    <th>Bureau</th>
                                    <th>Age</th>
                                    <th>Date</th>
                                    <th>Salaire</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011-04-25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011-07-25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009-01-12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012-03-29</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="dropleft pull-right">
                                            <a class="btn-dropdown dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                                    Action 1
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                    Action 2
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                                                    Action 3
                                                </a>
                                            </div>
                                        </div>
                                        Airi Satou
                                    </td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008-11-28</td>
                                    <td>
                                        <div class="dropleft pull-right">
                                            <a class="btn-dropdown dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                                    Action 1
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                    Action 2
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                                                    Action 3
                                                </a>
                                            </div>
                                        </div>
                                        $162,700
                                    </td>
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2012-12-02</td>
                                    <td>$372,000</td>
                                </tr>
                                <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>59</td>
                                    <td>2012-08-06</td>
                                    <td>$137,500</td>
                                </tr>
                                <tr>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>55</td>
                                    <td>2010-10-14</td>
                                    <td>$327,900</td>
                                </tr>
                                <tr>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>39</td>
                                    <td>2009-09-15</td>
                                    <td>$205,500</td>
                                </tr>
                                <tr>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>23</td>
                                    <td>2008-12-13</td>
                                    <td>$103,600</td>
                                </tr>
                                <tr>
                                    <td>Jena Gaines</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>30</td>
                                    <td>2008-12-19</td>
                                    <td>$90,560</td>
                                </tr>
                                <tr>
                                    <td>Quinn Flynn</td>
                                    <td>Support Lead</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2013-03-03</td>
                                    <td>$342,000</td>
                                </tr>
                                <tr>
                                    <td>Charde Marshall</td>
                                    <td>Regional Director</td>
                                    <td>San Francisco</td>
                                    <td>36</td>
                                    <td>2008-10-16</td>
                                    <td>$470,600</td>
                                </tr>
                                <tr>
                                    <td>Haley Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>London</td>
                                    <td>43</td>
                                    <td>2012-12-18</td>
                                    <td>$313,500</td>
                                </tr>
                                <tr>
                                    <td>Tatyana Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>19</td>
                                    <td>2010-03-17</td>
                                    <td>$385,750</td>
                                </tr>
                                <tr>
                                    <td>Michael Silva</td>
                                    <td>Marketing Designer</td>
                                    <td>London</td>
                                    <td>66</td>
                                    <td>2012-11-27</td>
                                    <td>$198,500</td>
                                </tr>
                                <tr>
                                    <td>Paul Byrd</td>
                                    <td>Chief Financial Officer (CFO)</td>
                                    <td>New York</td>
                                    <td>64</td>
                                    <td>2010-06-09</td>
                                    <td>$725,000</td>
                                </tr>
                                <tr>
                                    <td>Gloria Little</td>
                                    <td>Systems Administrator</td>
                                    <td>New York</td>
                                    <td>59</td>
                                    <td>2009-04-10</td>
                                    <td>$237,500</td>
                                </tr>
                                <tr>
                                    <td>Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>41</td>
                                    <td>2012-10-13</td>
                                    <td>$132,000</td>
                                </tr>
                                <tr>
                                    <td>Dai Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>Edinburgh</td>
                                    <td>35</td>
                                    <td>2012-09-26</td>
                                    <td>$217,500</td>
                                </tr>
                                <tr>
                                    <td>Jenette Caldwell</td>
                                    <td>Development Lead</td>
                                    <td>New York</td>
                                    <td>30</td>
                                    <td>2011-09-03</td>
                                    <td>$345,000</td>
                                </tr>
                                <tr>
                                    <td>Yuri Berry</td>
                                    <td>Chief Marketing Officer (CMO)</td>
                                    <td>New York</td>
                                    <td>40</td>
                                    <td>2009-06-25</td>
                                    <td>$675,000</td>
                                </tr>
                                <tr>
                                    <td>Caesar Vance</td>
                                    <td>Pre-Sales Support</td>
                                    <td>New York</td>
                                    <td>21</td>
                                    <td>2011-12-12</td>
                                    <td>$106,450</td>
                                </tr>
                                <tr>
                                    <td>Doris Wilder</td>
                                    <td>Sales Assistant</td>
                                    <td>Sydney</td>
                                    <td>23</td>
                                    <td>2010-09-20</td>
                                    <td>$85,600</td>
                                </tr>
                                <tr>
                                    <td>Angelica Ramos</td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td>London</td>
                                    <td>47</td>
                                    <td>2009-10-09</td>
                                    <td>$1,200,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin Joyce</td>
                                    <td>Developer</td>
                                    <td>Edinburgh</td>
                                    <td>42</td>
                                    <td>2010-12-22</td>
                                    <td>$92,575</td>
                                </tr>
                                <tr>
                                    <td>Jennifer Chang</td>
                                    <td>Regional Director</td>
                                    <td>Singapore</td>
                                    <td>28</td>
                                    <td>2010-11-14</td>
                                    <td>$357,650</td>
                                </tr>
                                <tr>
                                    <td>Brenden Wagner</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>28</td>
                                    <td>2011-06-07</td>
                                    <td>$206,850</td>
                                </tr>
                                <tr>
                                    <td>Fiona Green</td>
                                    <td>Chief Operating Officer (COO)</td>
                                    <td>San Francisco</td>
                                    <td>48</td>
                                    <td>2010-03-11</td>
                                    <td>$850,000</td>
                                </tr>
                                <tr>
                                    <td>Shou Itou</td>
                                    <td>Regional Marketing</td>
                                    <td>Tokyo</td>
                                    <td>20</td>
                                    <td>2011-08-14</td>
                                    <td>$163,000</td>
                                </tr>
                                <tr>
                                    <td>Michelle House</td>
                                    <td>Integration Specialist</td>
                                    <td>Sydney</td>
                                    <td>37</td>
                                    <td>2011-06-02</td>
                                    <td>$95,400</td>
                                </tr>
                                <tr>
                                    <td>Suki Burks</td>
                                    <td>Developer</td>
                                    <td>London</td>
                                    <td>53</td>
                                    <td>2009-10-22</td>
                                    <td>$114,500</td>
                                </tr>
                                <tr>
                                    <td>Prescott Bartlett</td>
                                    <td>Technical Author</td>
                                    <td>London</td>
                                    <td>27</td>
                                    <td>2011-05-07</td>
                                    <td>$145,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin Cortez</td>
                                    <td>Team Leader</td>
                                    <td>San Francisco</td>
                                    <td>22</td>
                                    <td>2008-10-26</td>
                                    <td>$235,500</td>
                                </tr>
                                <tr>
                                    <td>Martena Mccray</td>
                                    <td>Post-Sales support</td>
                                    <td>Edinburgh</td>
                                    <td>46</td>
                                    <td>2011-03-09</td>
                                    <td>$324,050</td>
                                </tr>
                                <tr>
                                    <td>Unity Butler</td>
                                    <td>Marketing Designer</td>
                                    <td>San Francisco</td>
                                    <td>47</td>
                                    <td>2009-12-09</td>
                                    <td>$85,675</td>
                                </tr>
                                <tr>
                                    <td>Howard Hatfield</td>
                                    <td>Office Manager</td>
                                    <td>San Francisco</td>
                                    <td>51</td>
                                    <td>2008-12-16</td>
                                    <td>$164,500</td>
                                </tr>
                                <tr>
                                    <td>Hope Fuentes</td>
                                    <td>Secretary</td>
                                    <td>San Francisco</td>
                                    <td>41</td>
                                    <td>2010-02-12</td>
                                    <td>$109,850</td>
                                </tr>
                                <tr>
                                    <td>Vivian Harrell</td>
                                    <td>Financial Controller</td>
                                    <td>San Francisco</td>
                                    <td>62</td>
                                    <td>2009-02-14</td>
                                    <td>$452,500</td>
                                </tr>
                                <tr>
                                    <td>Timothy Mooney</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>37</td>
                                    <td>2008-12-11</td>
                                    <td>$136,200</td>
                                </tr>
                                <tr>
                                    <td>Jackson Bradshaw</td>
                                    <td>Director</td>
                                    <td>New York</td>
                                    <td>65</td>
                                    <td>2008-09-26</td>
                                    <td>$645,750</td>
                                </tr>
                                <tr>
                                    <td>Olivia Liang</td>
                                    <td>Support Engineer</td>
                                    <td>Singapore</td>
                                    <td>64</td>
                                    <td>2011-02-03</td>
                                    <td>$234,500</td>
                                </tr>
                                <tr>
                                    <td>Bruno Nash</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>38</td>
                                    <td>2011-05-03</td>
                                    <td>$163,500</td>
                                </tr>
                                <tr>
                                    <td>Sakura Yamamoto</td>
                                    <td>Support Engineer</td>
                                    <td>Tokyo</td>
                                    <td>37</td>
                                    <td>2009-08-19</td>
                                    <td>$139,575</td>
                                </tr>
                                <tr>
                                    <td>Thor Walton</td>
                                    <td>Developer</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2013-08-11</td>
                                    <td>$98,540</td>
                                </tr>
                                <tr>
                                    <td>Finn Camacho</td>
                                    <td>Support Engineer</td>
                                    <td>San Francisco</td>
                                    <td>47</td>
                                    <td>2009-07-07</td>
                                    <td>$87,500</td>
                                </tr>
                                <tr>
                                    <td>Serge Baldwin</td>
                                    <td>Data Coordinator</td>
                                    <td>Singapore</td>
                                    <td>64</td>
                                    <td>2012-04-09</td>
                                    <td>$138,575</td>
                                </tr>
                                <tr>
                                    <td>Zenaida Frank</td>
                                    <td>Software Engineer</td>
                                    <td>New York</td>
                                    <td>63</td>
                                    <td>2010-01-04</td>
                                    <td>$125,250</td>
                                </tr>
                                <tr>
                                    <td>Zorita Serrano</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>56</td>
                                    <td>2012-06-01</td>
                                    <td>$115,000</td>
                                </tr>
                                <tr>
                                    <td>Jennifer Acosta</td>
                                    <td>Junior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>43</td>
                                    <td>2013-02-01</td>
                                    <td>$75,650</td>
                                </tr>
                                <tr>
                                    <td>Cara Stevens</td>
                                    <td>Sales Assistant</td>
                                    <td>New York</td>
                                    <td>46</td>
                                    <td>2011-12-06</td>
                                    <td>$145,600</td>
                                </tr>
                                <tr>
                                    <td>Hermione Butler</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>47</td>
                                    <td>2011-03-21</td>
                                    <td>$356,250</td>
                                </tr>
                                <tr>
                                    <td>Lael Greer</td>
                                    <td>Systems Administrator</td>
                                    <td>London</td>
                                    <td>21</td>
                                    <td>2009-02-27</td>
                                    <td>$103,500</td>
                                </tr>
                                <tr>
                                    <td>Jonas Alexander</td>
                                    <td>Developer</td>
                                    <td>San Francisco</td>
                                    <td>30</td>
                                    <td>2010-07-14</td>
                                    <td>$86,500</td>
                                </tr>
                                <tr>
                                    <td>Shad Decker</td>
                                    <td>Regional Director</td>
                                    <td>Edinburgh</td>
                                    <td>51</td>
                                    <td>2008-11-13</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>29</td>
                                    <td>2011-06-27</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011-01-25</td>
                                    <td>$112,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr style="clear: both; margin: 30px 0;">

                    <nav>
                        <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Onglet 1</button>

                            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Onglet 2</button>

                            <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Onglet 3</button>

                            <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#autre" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Onglet 4</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body text-justify">
                                <h5>Espace 1</h5>
                                Contenu d'espace réservé pour le panneau d'onglets. Celui-ci se rapporte à l'onglet d'accueil. Vous emmène à des kilomètres de haut, tellement haut, parce qu'elle a ce sourire international. Il y a un étranger dans mon lit, il y a un martèlement dans ma tête. Oh, non. Dans une autre vie, je te ferais rester. Parce que je, je suis capable de tout. De m'habiller pour ma bataille de couronnement. J'avais l'habitude de voler l'alcool de tes parents et de grimper sur le toit. Ton ton, bronzage en forme et prêt, monte le son parce que ça devient lourd. Son amour est comme une drogue. Je suppose que j'ai oublié que j'avais le choix.
                            </div>
                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card-body">
                                <h5>Espace 2</h5>
                                Contenu d'espace réservé pour le panneau d'onglets. Celui-ci se rapporte à l'onglet d'accueil. Vous emmène à des kilomètres de haut, tellement haut, parce qu'elle a ce sourire international. Il y a un étranger dans mon lit, il y a un martèlement dans ma tête. Oh, non. Dans une autre vie, je te ferais rester. Parce que je, je suis capable de tout. De m'habiller pour ma bataille de couronnement. J'avais l'habitude de voler l'alcool de tes parents et de grimper sur le toit. Ton ton, bronzage en forme et prêt, monte le son parce que ça devient lourd. Son amour est comme une drogue. Je suppose que j'ai oublié que j'avais le choix.
                            </div>
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="card-body">
                                <h5>Espace 3</h5>
                                Contenu d'espace réservé pour le panneau d'onglets. Celui-ci se rapporte à l'onglet d'accueil. Vous emmène à des kilomètres de haut, tellement haut, parce qu'elle a ce sourire international. Il y a un étranger dans mon lit, il y a un martèlement dans ma tête. Oh, non. Dans une autre vie, je te ferais rester. Parce que je, je suis capable de tout. De m'habiller pour ma bataille de couronnement. J'avais l'habitude de voler l'alcool de tes parents et de grimper sur le toit. Ton ton, bronzage en forme et prêt, monte le son parce que ça devient lourd. Son amour est comme une drogue. Je suppose que j'ai oublié que j'avais le choix.
                            </div>
                        </div>

                        <div class="tab-pane fade" id="autre" role="tabpanel" aria-labelledby="autre-tab">
                            <div class="card-body">
                                <h5>Espace 4</h5>
                                Contenu d'espace réservé pour le panneau d'onglets. Celui-ci se rapporte à l'onglet d'accueil. Vous emmène à des kilomètres de haut, tellement haut, parce qu'elle a ce sourire international. Il y a un étranger dans mon lit, il y a un martèlement dans ma tête. Oh, non. Dans une autre vie, je te ferais rester. Parce que je, je suis capable de tout. De m'habiller pour ma bataille de couronnement. J'avais l'habitude de voler l'alcool de tes parents et de grimper sur le toit. Ton ton, bronzage en forme et prêt, monte le son parce que ça devient lourd. Son amour est comme une drogue. Je suppose que j'ai oublié que j'avais le choix.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require '../views/scripts.php'; ?>

<script>
    $(document).ready(function() {
        $('#TAB_Example').dataTable({
            dom: 'Bflrtpi',
            buttons: ['copy',
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ":visible"
                    }
                }, {
                    extend: 'excel',
                    exportOptions: {
                        columns: ":visible"
                    }
                }, {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ":visible"
                    }
                }, {
                    extend: 'print',
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'colvis'
            ],
            language: {
                url: './assets/fr-FR.json'
            },
            columns: [null, null, null,
                {
                    width: '50px'
                }, {
                    width: '110px'
                },
                null
            ],
            columnDefs: [{
                visible: false
            }],
            "pageLength": 10,
            pagingType: 'full_numbers',
            "paging": true,
            order: [
                [0, 'asc']
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
        });
    });
</script>
<?php require '../views/footer.php'; ?>