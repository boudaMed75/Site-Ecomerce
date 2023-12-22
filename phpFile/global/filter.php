<div class="filtrage">
                  <h2>Filtres</h2>
                        <nav id="colors" class="accordion-container">
                            <div class="main-item">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 4l-8 4l8 4l8 -4l-8 -4"></path>
                                    <path d="M4 12l8 4l8 -4"></path>
                                    <path d="M4 16l8 4l8 -4"></path>
                                </svg>
                                Colors
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="expand-icon"
                                    width="44"
                                    height="44"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 6l6 6l-6 6" />
                                </svg>
                                </div>
                                <ul class="d-flex">
                                    <li>
                                    <?php 

                                        $req = $con->prepare("SELECT * FROM colors");
                                        $req -> execute();
                                        $res =$req-> fetchAll(PDO::FETCH_ASSOC);

                                        foreach($res as $ele){
                                            echo "<span data-id=\"".$ele['id']."\" style=\"background-color : ".$ele['name']."\"></span>";
                                        }
                                        ?>
                                    </li>
                                </ul>
                        </nav>
                        <nav id="size" class="accordion-container">
                            <div class="main-item">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 4l-8 4l8 4l8 -4l-8 -4"></path>
                                    <path d="M4 12l8 4l8 -4"></path>
                                    <path d="M4 16l8 4l8 -4"></path>
                                </svg>
                                Taille
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="expand-icon"
                                    width="44"
                                    height="44"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 6l6 6l-6 6" />
                                </svg>
                                </div>
                                
                                <ul>
                                <?php 

                                        $req = $con->prepare("SELECT * FROM size");
                                        $req -> execute();
                                        $res =$req-> fetchAll(PDO::FETCH_ASSOC);

                                        foreach($res as $ele){
                                            echo "<li data-id=\"".$ele['id']."\">".$ele['name']."</li>";
                                            
                                            
                                        }
                                        ?>
                                </ul>
                        </nav>
                        <nav id="marque" class="accordion-container">
                            <div class="main-item">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 4l-8 4l8 4l8 -4l-8 -4"></path>
                                    <path d="M4 12l8 4l8 -4"></path>
                                    <path d="M4 16l8 4l8 -4"></path>
                                </svg>
                                Marques
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="expand-icon"
                                    width="44"
                                    height="44"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 6l6 6l-6 6" />
                                </svg>
                                </div>
                                <ul>
                                <?php 

                                        $req = $con->prepare("SELECT * FROM marque");
                                        $req -> execute();
                                        $res =$req-> fetchAll(PDO::FETCH_ASSOC);

                                        foreach($res as $ele){
                                            echo "<li data-id=\"".$ele['id']."\">".$ele['name']."</li>";
                                            
                                            
                                        }
                                        ?>
                                </ul>
                        </nav>
                        <nav id="categories" class="accordion-container">
                            <div class="main-item">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 4l-8 4l8 4l8 -4l-8 -4"></path>
                                    <path d="M4 12l8 4l8 -4"></path>
                                    <path d="M4 16l8 4l8 -4"></path>
                                </svg>
                                        Category
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="expand-icon"
                                    width="44"
                                    height="44"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 6l6 6l-6 6" />
                                </svg>
                                </div>
                                <ul>
                                <?php 
                                        
                                        $req = $con->prepare("SELECT * FROM category WHERE sexe = ? ");
                                        $req ->bindValue(1,$sexe);
                                        $req -> execute();
                                        
                                        $res =$req-> fetchAll(PDO::FETCH_ASSOC);

                                        foreach($res as $ele){
                                            echo "<li data-id=\"".$ele['id']."\">".$ele['name']."</li>";
                                            
                                            
                                        }
                                        ?>
                                </ul>
                        </nav>
                        <nav id="sousCategories" class="accordion-container">
                            <div class="main-item">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 4l-8 4l8 4l8 -4l-8 -4"></path>
                                    <path d="M4 12l8 4l8 -4"></path>
                                    <path d="M4 16l8 4l8 -4"></path>
                                </svg>
                                Sous categories
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="expand-icon"
                                    width="44"
                                    height="44"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 6l6 6l-6 6" />
                                </svg>
                                </div>
                                <ul>
                                <?php 
                                        
                                        $req = $con->prepare("SELECT * FROM souscategory WHERE id_cat in 
                                        (SELECT id FROM category WHERE sexe = ?)");
                                        $req ->bindValue(1,$sexe);
                                        $req -> execute();
                                        
                                        $res =$req-> fetchAll(PDO::FETCH_ASSOC);

                                        foreach($res as $ele){
                                            echo "<li data-id=\"".$ele['id']."\">".$ele['name']."</li>";
                                            
                                            
                                        }
                                        ?>
                                </ul>
                        </nav>
                    </div>
            
            </div>