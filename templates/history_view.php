                <div>
                    <ul class="nav nav-tabs nav-justified">
                        <li><a href="quote.php">Quote</a></li>
                        <li><a href="buy.php">Buy</a></li>
                        <li><a href="sell.php">Sell</a></li>
                        <li class="active"><a>History</a></li>
                        <li><a href="index.php">Portfolio</a></li>
                        <li><a href="logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date / Time</th>
                                <th>Symbol</th>
                                <th>Name</th>
                                <th>Shares</th>
                                <th>Price</th>
                                <th>Transaction Type</th>
                                <th>Transaction Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($histories as $history): ?>
                            <tr>
                                <td><strong><?= $history["time"] ?></strong></td>
                                <td><?= $history["symbol"] ?></td>
                                <td><?= $history["name"] ?></td>
                                <td><?= $history["shares"] ?></td>
                                <td><?= $history["price"] ?></td>
                                <td><?= $history["type"] ?></td>
                                <td><strong><?= $history["total"] ?></strong></td>
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
                                <td><?= $balance ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <a href="logout.php">Log Out</a>
                </div>
