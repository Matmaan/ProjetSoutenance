<?php $this->layout('layout', ['title' => 'Bien débuter']) ?>

<?php $this->start('main_content') ?>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-4">
			<h2>Bien débuter</h2>

			<p>Chaques Batîment a un rôle important dans la vie de votre campement il est donc important d'en connaître les aspects techniques.</p>

			<table class="table" id="userList">
                    <thead>
                        <tr>
                            <th>Bâtiments</th>
                            <th>Fonctions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="color: white; background-color: brown; font-weight: bold;">Camp de bûcheron</td>
                            <td>Le camp de bûcheron vous permettra de gagner du bois qui est la ressource de base de ce jeu. Il est donc à privilégier dans un premier temps.</td>
                        </tr>
                        <tr>
                            <td style="color: white; background-color: brown; font-weight: bold;">Ferme</td>
                            <td>La ferme vous permettra de gagner de la nourriture, il faut bien nourrir vos campeurs non ? La nourriture est une ressource de la même importance que le bois, cependant elle est plus rare.</td>
                        </tr>
                        <tr>
                            <td style="color: white; background-color: brown; font-weight: bold;">Puit</td>
                            <td>Le puit produit de l'eau. L'eau est la ressource la plus rare sur ce jeu, il ne sera donc pas rare de vous retrouver à court de cette précieuse denrée. Surtout qu'elle est utilisé dans la construction de la plupart des bâtiments.</td>
                        </tr>
                        <tr>
                            <td style="color: white; background-color: brown; font-weight: bold;">Hangar</td>
                            <td>Le hangar vous permettra de stocker tout votre bois. Lorsque le stockage est plein votre camp de bûcheron arrêtera de produire du bois.</td>
                        </tr>
                        <tr>
                            <td style="color: white; background-color: brown; font-weight: bold;">Garde manger</td>
                            <td>Le garde manger vous permettra de stocker toute votre nourriture. Lorsque le stockage est plein votre ferme arrêtera de produire de la nourriture.</td>
                        </tr>
                        <tr>
                            <td style="color: white; background-color: brown; font-weight: bold;">Citerne</td>
                            <td>La citerne vous permettra de stocker toute votre eau. Lorsque le stockage est plein votre puit arrêtera de produire de l'eau.</td>
                        </tr>
                        <tr>
                            <td style="color: white; background-color: brown; font-weight: bold;">Cabanon</td>
                            <td>Le cabanon permet d'héberger vos campeur si votre nombre de cabanon c'est pas suffisant plus aucun campeur ne vous rejoindra.</td>
                        </tr>
                        <tr>
                            <td style="color: white; background-color: brown; font-weight: bold;">Station radio</td>
                            <td>La station radio est importante pour la course au classement. Chaque niveau supplémentaire vous permettra d'augmenter la fréquence à laquel les campeurs vous rejoigne.</td>
                        </tr>
                        <tr>
                            <td style="color: white; background-color: brown; font-weight: bold;">Mur de défence</td>
                            <td>Au moins une fois par jour vous subirez une attaque de zombie ou d'un autre camp. Le mur vous permettra de repousser ces attaques. Chaque niveau supplémentaire permettra d'augmenter vos chances de repousser les assauts.</td>
                        </tr>
                    </tbody>
                </table>
		</div>
	</div>
</div>





<?php $this->stop('main_content') ?>