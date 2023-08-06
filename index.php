

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"></h1>
                </div>
                <!-- Add your main content here -->
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                
                    <tbody>
                    <?php foreach ($admindata as $product)
                    { 
                     ?>
                     <tr>
                    <td><?php echo $product->id; ?></td>
                    <td><?php echo $product->name; ?></td>
                    <td><?php echo $product->email; ?></td>
                    <td><a href="edit?eid=<?php echo $product->id; ?>" >edit</td>
                    <td><a href="delete?did=<?php echo $product->id; ?>" >delete</td>
                     </tr>
                
                   <?php 
                    }
                   ?>
                  </tbody>
                    
                </table>


            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
