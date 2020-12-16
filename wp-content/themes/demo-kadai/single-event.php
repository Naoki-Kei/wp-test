<?php
/*
Template Name: カスタムページ
*/
?>

<?php get_header(); //header.phpを取得 ?>
  <div id="content">
    <article>
        <h2>Academy Corporation イベント情報</h2>
    <?php if ( have_posts() ) : //条件分岐：投稿があるなら ?>
      <?php while ( have_posts() ) : the_post();//繰り返し処理開始 ?>

        <section <?php post_class(); //投稿の種類に応じたクラスを付加 ?>>
          <h1 class="blog-title-article"><?php the_title(); //投稿（固定ページ）のタイトルを表示 ?></h1>
          <div class="blog-wrap">
            <div class="blog-header">
              <div class="date"><?php the_time('Y.m.d');//投稿日時を表示 パラメータで書式を指定 ?></div>
             </div>
            <div class="blog-body">
       
            
              <?php the_content(); //投稿（固定ページ）の本文を表示 ?>
            </div>
          </div>
        </section>

        <section class="page-navi">
          <?php next_post_link('%link', '&laquo; 新しい投稿へ' ); //新しい記事へのリンクを表示 ?>
          <?php previous_post_link('%link', '古い投稿へ &raquo;' ); //古い記事へのリンクを表示 ?>
        </section>

        <div id="comment-container"><?php comments_template(); //コメントテンプレートを取得 ?></div>

      <?php endwhile; // 繰り返し終了 ?>
    <?php else : //条件分岐：投稿が無い場合は ?>

      <h2>投稿がみつかりません。</h2>
      <p><a href="<?php echo esc_url(home_url('/')); ?>">トップページに戻る</a></p>

    <?php endif; //条件分岐終了 ?>

    </article>
    <aside>
      <?php get_sidebar(); //sidebar.phpを取得 ?>
    </aside>
  </div>
<?php get_footer(); //footer.phpを取得　PHPで終了するので閉じタグは不要です
