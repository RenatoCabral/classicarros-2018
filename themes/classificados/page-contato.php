<?php get_header(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="col s12 m12 l6 doubts-title">
                <div class="row ">
                    <h1><?php the_title(); ?></h1>
                    <p>Para alguma dúvida, crítica ou sugestão, entre em contato com o ClassiCarros. Teremos o prazer em atendê-lo. </div>
            </div>
            <div class="col s12 m12 l8">
                <div class="row">
                    <?= do_shortcode('[contact-form-7 id="64" title="Contato para o sistema"]'); ?>
<!--                                        <form class="col s12">-->
<!--                                            <div class="row">-->
<!--                                                <div class="input-field col s12 m12 l12">-->
<!--                                                    <i class="material-icons prefix">account_circle</i>-->
<!--                                                    <input id="name" type="text" class="validate">-->
<!--                                                    <label for="name">Nome Completo</label>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="row">-->
<!--                                                <div class="input-field col s12 m12 l6">-->
<!--                                                    <i class="material-icons prefix">phone_iphone</i>-->
<!--                                                    <input required id="icon_prefix" name="idx_user_phone" type="text" class="validate phone">-->
<!--                                                    <label for="icon_prefix">Celular</label>-->
<!--                                                </div>-->
<!--                                                <div class="input-field col s12 m12 l6">-->
<!--                                                    <i class="material-icons prefix">phone</i>-->
<!--                                                    <input required id="icon_prefix" name="idx_user_phone" type="text" class="validate phone">-->
<!--                                                    <label for="icon_prefix">Telefone</label>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="row">-->
<!--                                                <div class="input-field col s12 m12 l6">-->
<!--                                                    <i class="material-icons prefix">mail</i>-->
<!--                                                    <input id="email" type="email" class="validate">-->
<!--                                                    <label for="email">Email</label>-->
<!--                                                </div>-->
<!--                                                <div class="input-field col s12 m12 l6">-->
<!--                                                    <i class="material-icons prefix">assignment_ind</i>-->
<!--                                                    <input id="cpf" type="text" class="validate">-->
<!--                                                    <label for="cpf">CPF</label>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                                    <div class="row">-->
<!--                                                        <div class="input-field col s12 m12 l12">-->
<!--                                                            <i class="material-icons prefix">mode_edit</i>-->
<!--                                                            <textarea id="icon_prefix2" class="materialize-textarea"></textarea>-->
<!--                                                            <label for="icon_prefix2">Mensagem</label>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!---->
<!--                                            <a class="waves-effect waves-light btn"><i class="material-icons right">send</i>Enviar</a>-->
<!--                                        </form>-->
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
