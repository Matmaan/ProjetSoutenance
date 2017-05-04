<?php $this->layout('layout', ['title' => 'Tchat']) ?>

<?php $this->start('main_content') ?>
        <div class="col-md-6 col-md-offset-3">
            <h1 class="text-center">Feu de camps</h1>



            <section id="zone_chat">
                
            </section>
                        <form action="/" method="post" id="formulaire_chat">
                <div class="form-group">
                <input type="text" name="message" id="message" placeholder="Votre message..."  class=" btn-default form-control"size="50" autocomplete="off" autofocus />
                <!--<input type="submit" id="envoi_message" value="Envoyer"class="btn btn-default form-control" />-->
            </form>
        </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="http://192.168.1.138:3000/socket.io/socket.io.js"></script>
        <script>

            // Connexion à socket.io
            var socket = io.connect('192.168.1.138:3000');
            // On demande le pseudo, on l'envoie au serveur et on l'affiche dans le titre
            
            var pseudo = "<?php echo $_SESSION['user']['username'];?>";
            if(pseudo.length > 0){
            socket.emit('nouveau_client', pseudo);
            document.title = pseudo + ' - ' + document.title;
            }
            // Quand on reçoit un message, on l'insère dans la page
            socket.on('message', function(data) {
                insereMessage(data.pseudo+" a envoyé :", data.message)
            })

            // Quand un nouveau client se connecte, on affiche l'information
            socket.on('nouveau_client', function(pseudo) {
                $('#zone_chat').prepend('<p><em>' + pseudo + ' a rejoint le Chat !</em></p>');
                
            })

            // Lorsqu'on envoie le formulaire, on transmet le message et on l'affiche sur la page
            $('#formulaire_chat').submit(function () {
                var message = $('#message').val();
                if($('#message').val() == 0){
                    $('#message').val('').focus();
                    return false;                  
                }
                else{
                    socket.emit('message', message); // Transmet le message aux autres
                    insereMessage(pseudo+" :", message); // Affiche le message aussi sur notre page
                    $('#message').val('').focus(); // Vide la zone de Chat et remet le focus dessus
                    return false; // Permet de bloquer l'envoi "classique" du formulaire
                }
            });
            
            // Ajoute un message dans la page
            function insereMessage(pseudo, message) {
                var insultes =['con','connard','merde','pd','salope','petasse','pute','putain','salaud','bite','abruti','enculer','enculé','enculay','tg','ntm','batard','bougnoul','bougnoule','boukak','branleur','fdp','garce'];
                var words = message.split(' ');
                for(word in words){
                    var found = insultes.includes(words[word].toLowerCase());
                    if(found){
                        words[word]='****';
                    }
                }
                message = words.join(' ');
                $('#zone_chat').prepend('<p><strong>' + pseudo + '</strong> ' + message + '</p>');
            }
        </script>
<?php $this->stop('main_content') ?>
