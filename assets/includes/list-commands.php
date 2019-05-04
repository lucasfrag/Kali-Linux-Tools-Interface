<div class="collapse commands" id="commands">
    <h5 class="heading-small mb-4">List of commands</h5>
          <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="">
                  <tr>
                    <th><h5>Description</h5></th>
                    <th><h5>Command</h5></th>
                    <th><h5>Examples</h5></th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    $sql2 = $con->prepare("SELECT command, name, examples FROM commands WHERE tool=$tool ORDER BY name");
                    $sql2->execute();
                    $resultados2 = $sql2->fetchAll(PDO::FETCH_ASSOC);

                    // FOREACH BEGINS
                    foreach ($resultados2 as $resultado2) {
                      $command = $resultado2['command'];
                      $name = $resultado2['name'];
                      $examples = $resultado2['examples'];

                      echo "
                        <tr>
                          <td align='left'><b>$name</b></td>
                          <td>$command</td>
                          <td>$examples</td>
                        </tr>  
                      ";
                    }
                  ?>
                </tbody>
              </table>
          </div>
</div>