<?php


class Page {

    private static string $title = "Please pick a proper title...";

    static function setTitle(string $newTitle)  {
        self::$title = $newTitle;
    }
//Header
    static function header()    { ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?php echo self::$title; ?></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        </head>
        <body>
            <div class="container">
                <h1><?php echo self::$title; ?></h1>
    <?php }

//Body
        static function content() {
            echo "<h1>" . self::$title. "</h1>";
        }
//Footer
        static function footer() { ?>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>
        </html>
        
    <?php }

            static function shoeForm()  { ?>

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Shoe Brand</label>
                <input type="text" name="brand" class="form-control" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Size</label>
                <input type="number" name="size" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="smells">
                <label class="form-check-label" for="exampleCheck1">It smells!</label>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Type</label>
                <input type="string" name="type" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Color</label>
                <input type="color" name="color" class="form-control" id="exampleInputPassword1">
            </div>
            <input type="submit" class="btn btn-primary"></button>
            </form>
            <?php }

            public static function showShoe(Shoe $s) { ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Value</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Brand</td>
                    <td><?php echo $s->getBrand(); ?></td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td><?php echo $s->getSize(); ?></td>
                </tr>
                <tr>
                    <td>Smells</td>
                    <td><?php echo $s->getSmells(); ?></td>
                </tr>
            </tbody>

            </table>


            <?php }

        public static function showShoes(array $shoes)  {

            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Size</th>
                        <th>Smells</th>
                        <th>Color</th>
                        <th>Type</th>
                        <th>Delete</th>
                    </tr>
        </thead>
        <tbody>
            <?php

            foreach ($shoes as $s)  {
                echo '<tr>'
                . '<td>'.$s->getBrand().'</td>'
                . '<td>'.$s->getSize().'</td>';
                if ($s->getSmells())    {
                    echo '<td>Yes</td>';
                } else {
                    echo '<td>No</td>';
                }

                echo '<td style="background: '.$s->getColor().'" >'.$s->getColor().'</td>'
                . '<td>'.$s->getType().'</td>'
                . '<td><a href="?action=delete&id='.$s->getId().'"><div class="btn btn-danger">Delete</div></td>'
                . '</tr>'."\n";
            }
            
            ?>
        </tbody>
        </table>

            <?php

        }

        static function showError($errorData)   {

            if (is_array($errorData))   {
                //Do array things
                echo '<div class="alert alert-danger"><ul>';
                foreach ($errorData as $error)  {
                    echo "<li>".$error."</li>";
                }
                echo '</ul></div>';
                
            } else {
                //Show single error
                echo '<div class="alert alert-danger">'.$errorData.'</div>';
            }

        }

}
?>