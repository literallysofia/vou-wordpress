<?php

/**
 * The template for displaying the contact form
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */

?>

<?php

if (trim($_POST['contact_name']) === '') {
    $hasError = true;
} else {
    $name = trim($_POST['contact_name']);
}

if (trim($_POST['contact_email']) === '') {
    $hasError = true;
} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['contact_email']))) {
    $hasError = true;
} else {
    $email = trim($_POST['contact_email']);
}

if (trim($_POST['contact_message']) === '') {
    $hasError = true;
} else {
    if (function_exists('stripslashes')) {
        $message = stripslashes(trim($_POST['contact_message']));
    } else {
        $message = trim($_POST['contact_message']);
    }
}

if (!isset($hasError)) {
    $emailTo = get_option('admin_email');
    $subject = '[' . get_bloginfo('name') . '] Nova Mensagem de ' . $name;
    $body = "Nome: $name \n\nEmail: $email \n\nMensagem: \n$message";
    $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;

    wp_mail($emailTo, $subject, $body, $headers);
    $emailSent = true;
}

?>

<?php if (isset($emailSent) && $emailSent == true) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Email enviado!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<form class="needs-validation" novalidate method="post" action="<?php the_permalink(); ?>">
    <div class="form-group">
        <label for="contact_name" class="sr-only">Nome</label>
        <input type="text" class="form-control" id="contact_name" placeholder="Nome" name="contact_name" required value="<?php if (isset($_POST['contact_name'])) echo $_POST['contact_name']; ?>">
        <div class="invalid-feedback">
            Por favor, insere o teu nome.
        </div>
    </div>
    <div class=" form-group">
        <label for="contact_email" class="sr-only">Email</label>
        <input type="email" class="form-control" id="contact_email" placeholder="Email" name="contact_email" required value="<?php if (isset($_POST['contact_email']))  echo $_POST['contact_email']; ?>">
        <div class="invalid-feedback">
            Por favor, insere um email válido.
        </div>
    </div>
    <div class="form-group">
        <label for="contact_message" class="sr-only">Mensagem</label>
        <textarea class="form-control" id="contact_message" rows="7" placeholder="Mensagem" name="contact_message" required><?php if (isset($_POST['contact_message'])) {
                                                                                                                                if (function_exists('stripslashes')) {
                                                                                                                                    echo stripslashes($_POST['contact_message']);
                                                                                                                                } else {
                                                                                                                                    echo $_POST['contact_message'];
                                                                                                                                }
                                                                                                                            } ?></textarea>
        <div class="invalid-feedback">
            Por favor, insere uma mensagem.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>