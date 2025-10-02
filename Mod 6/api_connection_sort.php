<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Grid View</title>
        <link rel="stylesheet" href="./styles.css">
        <script src="./js/searchTable.js"> </script>
    </head>

    <body>

        <?php
            $url = "http://localhost:8080/joke";

            $response = file_get_contents($url);

            $data_json = json_decode($response, true);

            if($data_json && is_array($data_json)){
                //pagination
                $limit =3;
                $total_entries = count($data_json);
                $total_pages = ceil($total_entries/$limit);

                //Capture current page / default
                $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                //starting index of page

                if($currentPage < 1){
                    $currentPage =1;
                }
                elseif($currentPage > $total_pages){
                    $currentPage =$total_pages;
                }

                $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'category';
                $sortOrder = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'desc' : 'asc'; 

                usort($data_json, function($a,$b) use ($sortColumn, $sortOrder){
                    if($sortOrder == 'asc'){
                        return strcmp($a[$sortColumn], $b[$sortColumn]);
                    }
                    else{
                        return strcmp($b[$sortColumn], $a[$sortColumn]);
                    }
                });

                $startIndex = (($currentPage -1) * $limit);
                $pageData = array_slice($data_json,$startIndex,$limit);

                function toggleOrder($currentPage){
                    return $currentPage === 'asc' ? 'desc' : 'asc';
                }

                //search
                echo "<div class ='search-container'>";
                echo "<label for='searchInput'>Search: </label>";
                echo "<input type ='text' id='searchInput' onkeyup='searchTable()' placeholder='Search for something..'>";
                echo "</div>";


                //echo "<table border='1' cellpaddings='100'><tbody>";
                echo "<table id='dataGrid'>";
                echo "<th><a href='?page=$currentPage&sort=category&order=" . toggleOrder($sortOrder) . "'>category</a></th>";
                echo "<th><a href='?page=$currentPage&sort=joke&order=" . toggleOrder($sortOrder) . "'>joke</a></th>";
                echo "<th><a href='?page=$currentPage&sort=punchline&order=" . toggleOrder($sortOrder) . "'>punchline</a></th>";
                
                foreach($pageData as $row){
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["category"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["joke"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["punchline"]) . "</td>";
                }

                echo "</tbody>";
                echo "</table>";

                echo"<div style=margin-top: 20px;>";
                // display the previous link
                if($currentPage > 1){
                    echo "<a href=?page=" . ($currentPage -1) . "&sort=" . $sortColumn . "&order=" . $sortOrder . ">Previous \t</a>";
                }

                for($i =1; $i <= $total_pages; $i++){
                    if($i == $currentPage){
                        echo "<strong>$i</strong>";
                    }
                    else{
                        echo "<a href=?page=" . $i . "&sort=" . $sortColumn . "&order=" . $sortOrder . ">" . $i . "\t</a>";
                    }
                }

                if($currentPage < $total_pages){
                    echo "<a href=?page=" . ($currentPage +1) . "&sort=" . $sortColumn . "&order=" . $sortOrder . ">Next</a>";
                }
                echo "<div>";
            }
            else{
                echo "Problem making connection";
            }
        ?>
    </body>
</html>