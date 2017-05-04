<?php $this->layout('layout', ['title' => 'Camp']) ?>

<?php $this->start('main_content') ?>
<?php if ( !empty($alert) ): ?>
    <script type="text/javascript">
        alert("<?=$alert?>");
    </script>

<?php endif; ?>
<div class="container" id="game-board">
    <h1 class="text-center">Campement</h1>
        <!--batiment 1-->
    </br>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
            <div class="media">
            <img class="d-flex mr-3 img-responsive" src="assets/img/bucheron.jpg" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Camp de bûcheron</strong> Niveau : <?php echo $_SESSION["buildings"]->wood_farm; ?></h5>

                Le camp de bûcheron vous permettra d'enrichir votre camp en bois, une ressource essentielle à la survie de votre camp. 
                <p class="text-right">Prix : <?php echo $bucheron->GetPrixBois(); ?> bois</p>

                <?php if(empty($_SESSION["construct"]->wood_farm)):?>
                    <?php if($bucheron->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>2])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $bucheron->barre ?></div>
                        <div class="compteur" id="time<?php echo $bucheron->id ?>"></div>
                <?php endif ?>
            </div>
            </div>
        </div>
        <!--batiment 2-->
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
            <div class="media">
            <img class="d-flex mr-3 img-responsive" src="assets/img/farm.jpg" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Ferme</strong> Niveau : <?php echo $_SESSION["buildings"]->food_farm; ?></h5>

                Comment survivre sans manger ? Impossible ! Cette ferme vous aidera à faire prospérer votre campement dans la durée.

                <p>Prix : <?php echo $ferme->GetPrixBois(); ?> Bois <?php echo $ferme->GetPrixNourriture(); ?> nourriture</p>


                <?php if(empty($_SESSION["construct"]->food_farm)):?>
                    <?php if($ferme->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>3])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $ferme->barre ?></div>
                        <div class="compteur" id="time<?php echo $ferme->id ?>"></div>
                <?php endif ?>

            </div>
            </div>
        </div>
        <!--batiment 3-->
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
            <div class="media">
                <img class="d-flex mr-3 img-responsive" src="assets/img/puit.jpg" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0 text-left"><strong>Puit</strong> Niveau : <?php echo $_SESSION["buildings"]->water_farm; ?></h5>
                    
                    La base de la vie, l'eau ! Evidemment elle est tellement importante qu'elle est très rare. Il faut donc l'utiliser à bon escient.

                    <p>Prix : <?php echo $puit->GetPrixBois(); ?> bois <?php echo $puit->GetPrixNourriture(); ?> nourriture <?php echo $puit->GetPrixEau(); ?> eau</p>



                    <?php if(empty($_SESSION["construct"]->water_farm)):?>
                        <?php if($puit->action == 1): ?>
                            <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>4])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>
                        <div><?php echo $puit->barre ?></div>
                        <div class="compteur" id="time<?php echo $puit->id ?>"></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div> 

        <!--batiment 4-->
    <div class="row">
        </br>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
            <div class="media">
            <img class="d-flex mr-3 img-responsive" src="assets/img/hangar.jpg" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Hangar</strong> Niveau : <?php echo $_SESSION["buildings"]->wood_stock; ?></h5>

                Dans un monde post-apocalyptique il est évident que la richesse et le pouvoir passe par possession de ressource essentiel.

                <p>Prix : <?php echo $hangar->GetPrixBois(); ?> bois</p>


                <?php if(empty($_SESSION["construct"]->wood_stock)):?>
                    <?php if($hangar->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>5])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div>
                        <?php echo $hangar->barre ?>
                        <div class="compteur" id="time<?php echo $hangar->id ?>"></div>
                    </div>
                <?php endif ?>

                <div></div>
            </div>
            </div>
        </div>
        <!--batiment 5-->
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
            <div class="media">
            <img class="d-flex mr-3 img-responsive" src="assets/img/stockpile.jpg" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Garde manger</strong> Niveau : <?php echo $_SESSION["buildings"]->food_stock; ?></h5>

                A défaut d'avoir un frigo et de l'électricité au bout du fil il faut prévoir un lieu pour stocker votre nourriture.
                <p>Prix : <?php echo $garde_manger->GetPrixBois(); ?> Bois <?php echo $garde_manger->GetPrixNourriture(); ?> nourriture</p>


                <?php if(empty($_SESSION["construct"]->food_stock)):?>
                    <?php if($garde_manger->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>6])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $garde_manger->barre ?></div>
                        <div class="compteur" id="time<?php echo $garde_manger->id ?>"></div>
                <?php endif ?>

                <div ></div>
            </div>
            </div>
        </div>
        <!--batiment 6-->
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
            <div class="media">
            <img class="d-flex mr-3 img-responsive" src="assets/img/citerne.jpg" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Citerne</strong> Niveau : <?php echo $_SESSION["buildings"]->water_stock; ?></h5>

                L'eau peut être très vite contaminée par les zombies et les autre camps qui vous chercher à réduire votre camp à néant pour vous piller.

                <p>Prix : <?php echo $citerne->GetPrixBois(); ?> bois <?php echo $citerne->GetPrixNourriture(); ?> nourriture <?php echo $citerne->GetPrixEau(); ?> eau</p>



                    <?php if(empty($_SESSION["construct"]->water_stock)):?>
                        <?php if($citerne->action == 1): ?>
                            <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>7])?>'>Construire</a>
                        <?php endif ?>
                    <?php else:?>
                        <div class="compteurdiv"><?php echo $citerne->barre ?>
                            <div class="compteur" id="time<?php echo $citerne->id ?>"></div>
                        </div>
                    <?php endif ?>
                <div ></div>
            </div>
            </div>
        </div>
    </div>
        <!--batiment 7 -->
    </br>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
            <div class="media">
            <img class="d-flex mr-3 img-responsive" src="assets/img/cabane.jpg" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Cabanon</strong> Niveau : <?php echo $_SESSION["buildings"]->cabanon; ?></h5>

                Après avoir bien manger et bien bu vous serez bien content de bien dormir et quoi de mieux qu'une cabane que vous rêviez de bâtir étant petit.

                <p>Prix : <?php echo $cabane->GetPrixBois(); ?> bois <?php echo $cabane->GetPrixNourriture(); ?> nourriture <?php echo $cabane->GetPrixEau(); ?> eau</p>



                <?php if(empty($_SESSION["construct"]->cabanon)):?>
                    <?php if($cabane->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>8])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $cabane->barre ?></div>
                        <div class="compteur" id="time<?php echo $cabane->id ?>"></div>
                <?php endif ?>

                <div ></div>
            </div>
            </div>
        </div>
        <!--batiment 8-->
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
            <div class="media">
            <img class="d-flex mr-3 img-responsive" src="assets/img/radio.jpg" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Station de radio</strong> Niveau : <?php echo $_SESSION["buildings"]->radio; ?></h5>

                Plus on est de fous plus on rit ! Si vous espérez reconstruire l'humanité il va vous falloir de l'aider et pour avoir de l'aide il faut appeler à l'aide non ?

                <p>Prix : <?php echo $radio->GetPrixBois(); ?> bois <?php echo $radio->GetPrixNourriture(); ?> nourriture <?php echo $radio->GetPrixEau(); ?> eau</p>



                <?php if(empty($_SESSION["construct"]->radio)):?>
                    <?php if($radio->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>9])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $radio->barre ?></div>
                        <div class="compteur" id="time<?php echo $radio->id ?>"></div>
                <?php endif ?>

                <div></div>
            </div>
            </div>
        </div>
        <!--batiment 9-->
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
            <div class="media">
            <img class="d-flex mr-3 img-responsive" src="assets/img/mur.jpg" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 text-left"><strong>Mur de defense</strong> Niveau : <?php echo $_SESSION["buildings"]->wall; ?></h5>
                
                Afin de vous protéger des attaques de zombies il vous faut une enceinte pour vous protéger. Quoi de mieux qu'un mur qui pourra retenir une partie des assauts de zombies.

                <p>Prix : <?php echo $mur->GetPrixBois(); ?> bois <?php echo $mur->GetPrixNourriture(); ?> nourriture <?php echo $mur->GetPrixEau(); ?> eau</p>


               

                <?php if(empty($_SESSION["construct"]->wall)):?>
                    <?php if($mur->action == 1): ?>
                        <a class='btn btn-success btn-block' href='<?=$this->url('default_upgrade',['idBuilding'=>10])?>'>Construire</a>
                    <?php endif ?>
                <?php else:?>
                    <div><?php echo $mur->barre ?></div>
                        <div class="compteur" id="time<?php echo $mur->id ?>"></div>
                <?php endif ?>

                <div></div>
            </div>
            </div>
        </div>
    </div>
</div>


<?php $this->stop('main_content') ?>
