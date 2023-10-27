<?php include('header.php'); ?>
<main class="home">
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            TRENDING NOW
                        </div>
                        <div class="content-right">
                            <marquee behavior="" direction="left">
                                <div class="text-news">
                                    <?php Trading_news();?>
                                    
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-news">
        <div class="container">
            <div class="row">


            <?php Populer_news()?>
                <!-- <div class="col-8 content-left">
                    <figure>
                        <a href="news-detail.php">
                            <div class="thumbnail">
                                <img src="https://via.placeholder.com/730x415" alt="">
                                <div class="title">
                                    អ្នកជំនាញថា កម្ពុជាមិនទាន់ធ្លាក់ចូលទៅក្នុងវិបត្តិបំណុលនោះទេ ខណៈកម្ពុជាអាចនៅអាចគ្រប់គ្រងបានល្អ​
                                </div>
                            </div>
                        </a>
                    </figure>
                </div> -->
                <div class="col-4 content-right">
                        <?php main_popculer();?>
                </div>
            </div>
        </div>
    </section>

    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            SPORT NEWS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">
            <div class="row">
                <?php Get_news('sport') ?>
            </div>

    </section>

    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            SOCIAL NEWS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">
            <div class="row">
                <?php Get_news('socail') ?>
            </div>
        </div>
    </section>
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            ENTERTAINMENT NEWS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">
            <div class="row">
                <?php Get_news('Entertaintermen') ?>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>