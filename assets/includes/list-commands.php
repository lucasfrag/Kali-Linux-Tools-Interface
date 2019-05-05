<div class="collapse commands" id="commands">
    <h5 class="heading-small mb-4">List of commands</h5>
          <div class="table-responsive">
              <table id='escalation' class="table  table-bordered table-striped">
                <thead>
                  <tr class="bg-primary">
                    <th><h5 style="color: white">Command</h5></th>
                    
                  </tr>
                </thead>
                <tbody>

                  <?php
                    $sql2 = $con->prepare("SELECT command, name, examples, type FROM commands WHERE tool=$tool ORDER BY name");
                    $sql2->execute();
                    $resultados2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

                    // FOREACH BEGINS
                    foreach ($resultados2 as $resultado2) {
                      $command = $resultado2['command'];
                      $name = $resultado2['name'];
                      $examples = $resultado2['examples'];
                      $type = $resultado2['type'];

                      echo
                      " <tr> 
                          <td align='left'><b>$name</b> ";

                          if ($type == "input") {
                            echo "<span class='badge badge-pill badge-success'> Input Text</span>";
                          } else if ($type == "checkbox") {
                            echo "<span class='badge badge-pill badge-primary'> Checkbox</span>";
                          } else if ($type == "target") {
                            echo "<span class='badge badge-pill badge-danger'> Target</span>";
                          } else if ($type == "show") {
                            echo "<span class='badge badge-pill badge-warning'> Show Info</span>";
                          }

                      echo    
                          "<br> $command</td>
                          
                        </tr>  
                      ";
                    }
                  ?>
                </tbody>
              </table>
          </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
        $('#escalation').DataTable();
    });
</script>