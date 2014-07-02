                <form action="quote.php" method="post">
                     <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="quote.php">Quote</a></li>
                        <li><a href="buy.php">Buy</a></li>
                        <li><a href="sell.php">Sell</a></li>
                        <li><a href="history.php">History</a></li>
                        <li><a href="index.php">Portfolio</a></li>
                        <li><a href="logout.php"><strong>Log Out</strong></a></li>
                    </ul>
                    <fieldset>
                        <div class="form-group">
                            <input autofocus class="form-control" name="symbol" placeholder="Stock Symbol" type="text"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Get Quote</button>
                        </div>
                    </fieldset>
                </form>
