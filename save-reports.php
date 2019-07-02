<?php
  $tool = $_POST["tool_selected"];
  $command_executed = $_POST["command_executed"];
  $report_name = $_POST["report_name"];
  $output_data = $_POST["output_data"];

  include('assets/includes/config.php');
  $con = getConnectionDB() or die ("Could not connect to database.");

  $sql = $con->prepare("SELECT solution FROM tools WHERE name = '$tool' ");
  
  if ($sql->execute()) {
      $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
      // FOREACH BEGINS
      foreach ($resultados as $resultado) {
        $solution = $resultado["solution"];
        $sql2 = $con->prepare("INSERT INTO reports (name, command, tools, output, solution, dataHour) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");


        if ($sql2->execute(array ($tool, $command_executed, $report_name, $output_data, $solution))) {
          echo
              "
                    <div class='card card-stats zoom-effect'>
                        <div class='card-body'>
                          <div class='row'>
                            <div class='col'>
                              <h5 class='card-title text-uppercase text-muted mb-0'>Save to reports</h5>
                              <span class='h3 font-weight-bold mb-0'>
                                <input id='report-name' type='text' class='form-control form-control-alternative' name='report-name' placeholder='Choose a name to this report'>
                               </span>
                            </div>
                            <div class='col-auto'>
                              <div class='icon icon-shape bg-yellow text-white rounded-circle shadow'>
                                <i class='ni ni-single-copy-04'></i>
                              </div>
                            </div>
                          </div>
                          <p class='mt-3 mb-0 text-muted text-sm'>
                          </p>
                            <textarea id='command-executed' hidden>".$run."</textarea>
                          <button class='btn btn-success' disabled onclick='save()'><i class='ni ni-single-copy-04'></i> Save to Reports</button><span class='alert-inner--text text-green'><strong>Success!</strong> Save to reports successfully!</span>
                        </div>
                      </div>
                "; 
        }
      }

    } else {
            echo 
"
                  <div class='card card-stats zoom-effect'>
                      <div class='card-body'>
                        <div class='row'>
                          <div class='col'>
                            <h5 class='card-title text-uppercase text-muted mb-0'>Save to reports</h5>
                            <span class='h3 font-weight-bold mb-0'>
                              <input id='report-name' type='text' class='form-control form-control-alternative' name='report-name' placeholder='Choose a name to this report'>
                             </span>
                          </div>
                          <div class='col-auto'>
                            <div class='icon icon-shape bg-yellow text-white rounded-circle shadow'>
                              <i class='ni ni-single-copy-04'></i>
                            </div>
                          </div>
                        </div>
                        <p class='mt-3 mb-0 text-muted text-sm'>
                        </p>
                          <textarea id='command-executed' hidden>".$run."</textarea>
                        <button class='btn btn-success' onclick='save()'><i class='ni ni-single-copy-04'></i> Save to Reports</button><span class='alert-inner--text text-red'><strong>Error!</strong> Please, try again!</span>
                      </div>
                    </div>

";

    }
?>