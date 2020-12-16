<?php
/*
Template Name: トップページ
*/
?>

<?php get_header(); //header.phpを取得 ?>
  <div id="content">
    <article>
        
        <?php if ( have_posts() ) : //条件分岐：投稿があるなら ?>
          <?php while ( have_posts() ) : the_post();//繰り返し処理開始 ?>
    
            <section <?php post_class(); //投稿の種類に応じたクラスを付加 ?>>
              <h1><?php the_title(); //投稿（固定ページ）のタイトルを表示 ?></h1>
              <?php the_content(); //投稿（固定ページ）の本文を表示 ?>
            </section>

          <?php endwhile; // 繰り返し終了 ?>
        <?php else : // 条件分岐：投稿が無い場合は ?>

          <h2>投稿が見つかりません。</h2>

        <?php endif; // 条件分岐終了 ?>
        
 
    <?php
      //　--------- 新着情報を3件表示　---------
      $args = array(
        'post_type'  => 'event',  // カテゴリー「news」を読み込む
        'posts_per_page' => 5       // 表示数　3件
      );
      $the_query = new WP_Query( $args );// 新規WP query を作成　変数args で定義したパラメータを参照
      if ( $the_query->have_posts() ) :
      // ここから表示する内容を記入
    ?>

      <section>
        <h2 class="section-title">EVENT</h2>
        <ul class="news-list">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
        // -------- ここから繰り返し---------- ?>

          <li>
            <span class="date"><?php the_time('Y.m.d'); ?></span>
            <span class="label-info">イベント</span>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </li>

        <?php // -------- 繰り返しここまで-----------
          endwhile;
        ?>

        </ul>
        <div class="center">
            <a href="<?php echo get_post_type_archive_link( get_post_type() ); ?>" class="btn btn-default">イベント</a>
        </div>
        </section>

    <?php
      // -------- 新着情報WP_query終了-----------
      wp_reset_postdata();
      endif;
    ?>  

    </article>
    <aside>
      <?php get_sidebar(); //sidebar.phpを取得 ?>
    </aside>
  </div>
<?php get_footer(); //footer.phpを取得　PHPで終了するので閉じタグは不要です
