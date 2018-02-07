<div class="col s12 m12 l6">
	<p class="title-proposta">FICOU INTERESSADO?</p>
	<br>
	<form id="single-form">
		<div class="row">
			<div class="input-field col s12 m12 l6">
				<i class="material-icons prefix">account_circle</i>
				<input required id="nome" type="text" class="input-name validate">
				<label for="nome">Nome Completo: </label>
			</div>

			<div class="input-field col s12 m12 l6">
				<i class="material-icons prefix">markunread</i>
				<input required id="icon_prefix"  type="email" class="input-email validate">
				<label for="icon_prefix">Email</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12 m12 l6">
				<i class="material-icons prefix">phone</i>
				<input required id="icon_prefix" type="text" class="validate phone input-phone">
				<label for="icon_prefix">Telefone</label>
			</div>

			<div class="input-field col s12 m12 l6">
				<i class="material-icons prefix">assignment_ind</i>
				<input required id="icon_prefix" type="text" class="validate phone input-cpf">
				<label for="icon_prefix">CPF</label>
			</div>
		</div>

		<div class="row">
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<i class="material-icons prefix">mode_edit</i>
					<textarea required id="msg" class="materialize-textarea input-details"></textarea>
					<label for="msg">Detalhe sua Proposta</label>
				</div>
			</div>
		</div>
		<input type="hidden" class="input-url" value="<?php the_permalink() ?>">
		<input type="hidden" class="input-title" value="<?php the_title() ?>">
		<div class="input-field col s12 m12 l12 btn_basic_search">
			<button class="btn waves-effect waves-light button-send-proposta">Enviar Proposta
				<i class="material-icons right">send</i>
			</button>
		</div>

	</form>
	<div id="notification"></div>
</div>