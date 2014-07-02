                <form action="quote.php" method="post">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="quote.php">Quote</a></li>
                        <li><a href="buy.php">Buy</a></li>
                        <li><a href="sell.php">Sell</a></li>
                        <li><a href="history.php">History</a></li>
                        <li><a href="index.php">Portfolio</a></li>
                        <li><a href="logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                    <?php $s = lookup($_POST["symbol"]); ?>    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Symbol</th>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $s["symbol"] ?></td>
                                <td><?= $s["name"] ?></td>
                                <td><?= number_format(($s["price"]), $decimals = 2 , $dec_point = "." , $thousands_sep = "," ); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <div>
                    <a href="quote.php">Search Again</a>
                </div>
