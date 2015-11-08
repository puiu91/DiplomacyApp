<?php

session_start();

function debug($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

class OrderGenerator 
{
    public $unit;
    public $order;
    public $currentProvince;
    public $targetProvince;
    public $html;

    public function __construct($order) {

        if ($order['unit'] === 'Army')
            $this->unit = 'A';
        if ($order['unit'] === 'Navy')
            $this->unit = 'N';

        $this->order = $order['order'];
        $this->currentProvince = $order['currentProvince'];
        $this->targetProvince = $order['targetProvince'];
    }

    public function determineOrderType() {
        switch ($this->order) {
            case 'Hold':
                $this->html = $this->createHold();
                return $this->html;
                break;

            case 'Move':
                $this->html = $this->createMove();
                return $this->html;
                break;

            case 'Support':
                $this->html = $this->createSupport();
                return $this->html;
                break;

            case 'Convoy':
                $this->html = $this->createConvoy();
                return $this->html;
                break;             
            
            default:
                break;
        }
    }

    public function createHold() 
    {
        // A | Berlin <i class="fa fa-location-arrow"></i> Silesia
        $html = $this->unit . ' | ';
        $html = $html . $this->currentProvince . ' ';
        $html = $html . '<i class="fa fa-hand-paper-o"></i>';

        return $html;
    }

    public function createMove() {
        // A | Berlin <i class="fa fa-location-arrow"></i> Silesia
        $html = $this->unit . ' | ';
        $html = $html . $this->currentProvince . ' ';
        $html = $html . '<i class="fa fa-location-arrow"></i>' . ' ' . $this->targetProvince;

        return $html;
    }

    public function createSupport() {
        // A | Bohemia <i class="fa fa-shield"></i> Silesia</a>
        $html = $this->unit . ' | ';
        $html = $html . $this->currentProvince . ' ';
        $html = $html . '<i class="fa fa-shield"></i>' . ' ' . $this->targetProvince;
        return $html;
    }

    public function createConvoy() {
        $html = $this->unit . ' | ';
        $html = $html . $this->currentProvince . ' ';
        $html = $html . '<i class="fa fa-ship"></i>' . ' ' . $this->targetProvince;
        return $html;
    }

}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $OrderGenerater = new OrderGenerator($_POST);

    $html = $OrderGenerater->determineOrderType();

    $_SESSION['actions'][] = $html;

    // debug($_SESSION['actions']);
}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Template for Bootstrap</title>
    
    <!-- <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.blue-light_blue.min.css" />  -->
    <link rel="stylesheet" href="dist/css/material.css">
    <script src="dist/js/material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <!-- Forms -->
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/pure/0.6.0/forms-min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>

    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">

                <!-- Title -->
                <span class="mdl-layout-title">Diplomacy</span>

                <!-- Add spacer, to align navigation to the right -->            
                <div class="mdl-layout-spacer"></div>

                <!-- Navigation -->
                <!--
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="">Link</a>
                    <a class="mdl-navigation__link" href="">Link</a>
                </nav>
                -->

            </div>
        </header>

        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Actions</span>
            <nav id="orderList" class="mdl-navigation">

                <?php if ( ! empty($_SESSION['actions'])): ?>
                    <?php foreach($_SESSION['actions'] as $key => $value): ?>
                        <a class="mdl-navigation__link" href="deleteOrder.php?id=<?php echo $key; ?>"><?php echo $value ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- <a class="mdl-navigation__link" href="">A | Berlin <i class="fa fa-location-arrow"></i> Silesia</a> -->
                <!-- <a class="mdl-navigation__link" href="">A | Bohemia <i class="fa fa-shield"></i> Silesia</a> -->
            </nav>

            <?php ?>

            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="clearOrders.php">
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                        Clear All Orders
                    </button> 
                </a>                 
            </nav>


        </div>


        <main class="mdl-layout__content mdl-color--grey-100">

            <div class="mdl-grid">

                <div class="mdl-shadow--4dp mdl-cell mdl-cell--12-col">
                    <div class="mdl-grid">

                        <!-- Form Container -->
                        <div class="mdl-card__supporting-text">
                            <h4>Order Creation</h4>
                            <hr>

                            <!-- Form -->
                            <form class="pure-form pure-form-stacked" action="" method="POST">
                                <fieldset>
                                    <label for="email">Unit</label>
                                    <select id="unit" name="unit">
                                        <option>Army</option>
                                        <option>Navy</option>
                                    </select>

                                    <label for="email">Order Type</label>
                                    <select id="order" name="order">
                                        <option>Hold</option>
                                        <option>Move</option>
                                        <option>Support</option>
                                        <option>Convoy</option>
                                    </select>

                                    <label for="state">Current Province</label>
                                    <select id="currentProvince" name="currentProvince">
                                        <option value="None" selected>None</option>
                                        <option value="Adriatic Sea">Adriatic Sea</option>
                                        <option value="Aegean Sea">Aegean Sea</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Ankara">Ankara</option>
                                        <option value="Apulia">Apulia</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Baltic Sea">Baltic Sea</option>
                                        <option value="Barents Sea">Barents Sea</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Berlin">Berlin</option>
                                        <option value="Black Sea">Black Sea</option>
                                        <option value="Bohemia">Bohemia</option>
                                        <option value="Brest">Brest</option>
                                        <option value="Budapest">Budapest</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burgundy">Burgundy</option>
                                        <option value="Clyde">Clyde</option>
                                        <option value="Constantinople">Constantinople</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Eastern Mediterranean">Eastern Mediterranean</option>
                                        <option value="Edinburgh">Edinburgh</option>
                                        <option value="English Channel">English Channel</option>
                                        <option value="Finland">Finland</option>
                                        <option value="Galicia">Galicia</option>
                                        <option value="Gascony">Gascony</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Gulf of Bothnia">Gulf of Bothnia</option>
                                        <option value="Gulf of Lyon">Gulf of Lyon</option>
                                        <option value="Helgoland Bight">Helgoland Bight</option>
                                        <option value="Holland">Holland</option>
                                        <option value="Ionian Sea">Ionian Sea</option>
                                        <option value="Irish Sea">Irish Sea</option>
                                        <option value="Kiel">Kiel</option>
                                        <option value="Liverpool">Liverpool</option>
                                        <option value="Livonia">Livonia</option>
                                        <option value="London">London</option>
                                        <option value="Marseilles">Marseilles</option>
                                        <option value="Mid-Atlantic Ocean">Mid-Atlantic Ocean</option>
                                        <option value="Moscow">Moscow</option>
                                        <option value="Munich">Munich</option>
                                        <option value="Naples">Naples</option>
                                        <option value="North Africa">North Africa</option>
                                        <option value="North Atlantic Ocean">North Atlantic Ocean</option>
                                        <option value="North Sea">North Sea</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Norwegian Sea">Norwegian Sea</option>
                                        <option value="Paris">Paris</option>
                                        <option value="Picardy">Picardy</option>
                                        <option value="Piedmont">Piedmont</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Prussia">Prussia</option>
                                        <option value="Rome">Rome</option>
                                        <option value="Ruhr">Ruhr</option>
                                        <option value="Rumania">Rumania</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Sevastopol">Sevastopol</option>
                                        <option value="Silesia">Silesia</option>
                                        <option value="Skagerrak">Skagerrak</option>
                                        <option value="Smyrna">Smyrna</option>
                                        <option value="Spain">Spain</option>
                                        <option value="St Petersburg">St Petersburg</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Trieste">Trieste</option>
                                        <option value="Tunis">Tunis</option>
                                        <option value="Tuscany">Tuscany</option>
                                        <option value="Tyrolia">Tyrolia</option>
                                        <option value="Tyrrhenian Sea">Tyrrhenian Sea</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="Venice">Venice</option>
                                        <option value="Vienna">Vienna</option>
                                        <option value="Wales">Wales</option>
                                        <option value="Warsaw">Warsaw</option>
                                        <option value="Western Mediterranean">Western Mediterranean</option>
                                        <option value="Yorkshire">Yorkshire</option>
                                    </select>     

                                    <label for="state">Target Province</label>
                                    <select id="targetProvince" name="targetProvince">
                                        <option value="None" selected>None</option>
                                        <option value="Adriatic Sea">Adriatic Sea</option>
                                        <option value="Aegean Sea">Aegean Sea</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Ankara">Ankara</option>
                                        <option value="Apulia">Apulia</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Baltic Sea">Baltic Sea</option>
                                        <option value="Barents Sea">Barents Sea</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Berlin">Berlin</option>
                                        <option value="Black Sea">Black Sea</option>
                                        <option value="Bohemia">Bohemia</option>
                                        <option value="Brest">Brest</option>
                                        <option value="Budapest">Budapest</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burgundy">Burgundy</option>
                                        <option value="Clyde">Clyde</option>
                                        <option value="Constantinople">Constantinople</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Eastern Mediterranean">Eastern Mediterranean</option>
                                        <option value="Edinburgh">Edinburgh</option>
                                        <option value="English Channel">English Channel</option>
                                        <option value="Finland">Finland</option>
                                        <option value="Galicia">Galicia</option>
                                        <option value="Gascony">Gascony</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Gulf of Bothnia">Gulf of Bothnia</option>
                                        <option value="Gulf of Lyon">Gulf of Lyon</option>
                                        <option value="Helgoland Bight">Helgoland Bight</option>
                                        <option value="Holland">Holland</option>
                                        <option value="Ionian Sea">Ionian Sea</option>
                                        <option value="Irish Sea">Irish Sea</option>
                                        <option value="Kiel">Kiel</option>
                                        <option value="Liverpool">Liverpool</option>
                                        <option value="Livonia">Livonia</option>
                                        <option value="London">London</option>
                                        <option value="Marseilles">Marseilles</option>
                                        <option value="Mid-Atlantic Ocean">Mid-Atlantic Ocean</option>
                                        <option value="Moscow">Moscow</option>
                                        <option value="Munich">Munich</option>
                                        <option value="Naples">Naples</option>
                                        <option value="North Africa">North Africa</option>
                                        <option value="North Atlantic Ocean">North Atlantic Ocean</option>
                                        <option value="North Sea">North Sea</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Norwegian Sea">Norwegian Sea</option>
                                        <option value="Paris">Paris</option>
                                        <option value="Picardy">Picardy</option>
                                        <option value="Piedmont">Piedmont</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Prussia">Prussia</option>
                                        <option value="Rome">Rome</option>
                                        <option value="Ruhr">Ruhr</option>
                                        <option value="Rumania">Rumania</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Sevastopol">Sevastopol</option>
                                        <option value="Silesia">Silesia</option>
                                        <option value="Skagerrak">Skagerrak</option>
                                        <option value="Smyrna">Smyrna</option>
                                        <option value="Spain">Spain</option>
                                        <option value="St Petersburg">St Petersburg</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Trieste">Trieste</option>
                                        <option value="Tunis">Tunis</option>
                                        <option value="Tuscany">Tuscany</option>
                                        <option value="Tyrolia">Tyrolia</option>
                                        <option value="Tyrrhenian Sea">Tyrrhenian Sea</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="Venice">Venice</option>
                                        <option value="Vienna">Vienna</option>
                                        <option value="Wales">Wales</option>
                                        <option value="Warsaw">Warsaw</option>
                                        <option value="Western Mediterranean">Western Mediterranean</option>
                                        <option value="Yorkshire">Yorkshire</option>
                                    </select>    

                                    <br>                               

                                    <!-- Accent-colored raised button with ripple -->
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                        Submit Order
                                    </button>                                    
                                </fieldset>
                            </form>       
                            <!-- Form -->
                        </div>
                        <!-- Form Container -->

                    </div>
                </div>

            </div>





<!--             <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <h5>Testing phase</h5>
            </div> -->


        </main>



    </div>


    <!-- Javascript -->
    <script src="dist/js/diplomacy.js"></script>

</body>
</html>