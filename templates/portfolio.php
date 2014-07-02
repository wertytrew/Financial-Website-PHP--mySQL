                <div>
                    <ul class="nav nav-tabs nav-justified">
                        <li><a href="quote.php">Quote</a></li>
                        <li><a href="buy.php">Buy</a></li>
                        <li><a href="sell.php">Sell</a></li>
                        <li><a href="history.php">History</a></li>
                        <li class="active"><a href="portfolio.php">Portfolio</a></li>
                        <li><a href="logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Symbol</th>
                                <th>Name</th>
                                <th>Shares</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($positions as $position): ?>
                            <tr>
                                <td><?= $position["symbol"] ?></td>
                                <td><?= $position["name"] ?></td>
                                <td><?= $position["shares"] ?></td>
                                <td><?= $position["price"] ?></td>
                                <td><strong><?= $position["total"] ?></strong></td>
                            <?php endforeach ?>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>CURRENT BALANCE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $position["cash"] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <a href="reset.php">Change Your Password</a>
                <br>or
                    <a href="logout.php">Log Out</a>
                </div>
