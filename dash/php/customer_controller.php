<?php


function display_customers_super()
{
    $conn = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
    $getCustomers = $conn->prepare("select * from recepti");
    $getCustomers->execute();
    $customers = $getCustomers->fetchAll();
    foreach ($customers as $customer) {

        echo '
                                              <tr>
                                              <td>' . ucfirst($customer['title']) . '</td>
                                              <td>' .ucfirst($customer['top']) . '</td>
                                              <td>' . $customer['short_details'] . '</td>
                                              <td>' . ucfirst($customer['category']) . '</td>
                                              <td>' . $customer['toughnes'] . '</td>
                                              <td style="display:-webkit-box">' . '<form action="recipe_details_controller.php" method="post">
                                                    <input type="hidden" name="id"  value="' . $customer["id"] . '" required>
                                                    <input type="submit" name="change" class="btn btn-default btn-sm" value="Details">
                                                    </form>
                                              <form action="delete_customer.php" method="post">
                                              <input type="hidden" name="id"  value="' . $customer["id"] . '" required>
                                              <input type="submit" name="delete" class="btn btn-default btn-sm" value="Delete">
                                              </form> </td>
                                            </tr>';
    }
}

?>
