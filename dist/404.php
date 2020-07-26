<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage VOU
 * @since VOU 1.0
 */

get_header();
?>

<main class="page">
    <div class="container-fluid">
        <div class="heading">
            <h2>Woops!</h2>
            <h1><?php echo 'Página não encontrada' ?></h1>
        </div>
        <p>Desculpa, mas a página que estás à procura não existe, foi removida, alterou de nome ou está temporariamente indisponível.</p>
        <button type="button" class="btn btn-primary mt-5">Voltar ao Início</button>
    </div>
</main>

<?php get_footer(); ?>