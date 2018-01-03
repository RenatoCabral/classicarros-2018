<!--
por padrao o wp usa a variavel s para buscar os posts por GET.
por padrao a action nao busca arquivo algum, faz apenas a adicao do GET na url do site.

the_search_query é a funcao responsavel por trazer o que foi buscado, ou seja,
o que foi digitado no input e passado no GET na variavel s.


por padrao, a variavel s busca: title, content, e excerpt.
No nosso caso nao tem excerpt.

Qnd clicar em buscar sera redirecionado para o arquivo search.php. Como sei que tenho que ir para esse arquivo?
Pq tenho a variavel s com valor... s quer dizer search.
-->
<strong>Pesquise aqui</strong>
<form id="searchform-blog" action="/" method="GET">
    <input required type="search" name="s" />
    <input type="hidden" name="post_type" value="blog">  <!-- irá buscar apenas o post type blog,
            assim nao trará paginas e/ou veiculos -->
</form>

<!--exemplo: https://codepen.io/912lab/pen/LsplC-->