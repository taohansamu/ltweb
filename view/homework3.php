<?php 
include("../layout/header.php");
include("../php/function.php");
 ?>
 <div id="content">
 	<table width="90%">
 		<tr>
 			<td align="left">
 				<form method="POST">
			 		<table>
			 			<tr>
			 				<td>Radias or Degrees</td>
			 				<td><input type="text" name="radias_degrees" required></td>
			 			</tr>
			 			<tr>
			 				<td>
			 					Select function
			 				</td>
			 				<td>
			 				<input type="submit" name="deg_to_rad" value="Deg to Rad">
			 				<input type="submit" name="rad_to_deg" value="Rad to Deg"></td>
			 			</tr>
			 			<tr>
			 				<td>RESULT</td>
			 				<td style="color:red">
			 					<?php 
			 						if(isset($_POST["deg_to_rad"])){
			 							$result=$_POST["radias_degrees"]*3.14/180;
			 							echo $result;
			 						}
			 						elseif(isset($_POST["rad_to_deg"])){
			 							$result=$_POST["radias_degrees"]*180/3.14;
			 							echo $result;
			 						}
			 						else  echo "Ban chua nhap dl"
			 					 ?>
			 				</td>
			 			</tr>
			 		</table>
 				</form>
 			</td>

 			<td align="right">
 				<form method="POST">
 					<table>
 						<tr>
 							<td>
 								<table>
 									<caption>People 1</caption>
 									<tr>
				 						<td>Name</td>
				 						<td>
				 							<input type="text" name="name1"	required>
				 						</td>
				 					</tr>
				 					<tr>
				 						<td>Birthday</td>
				 						<td>
				 							<input type="text" name="birthday1" placeholder="1995-01-13"	required>
				 						</td>
				 					</tr>
 								</table>
 							</td>
 							<td>
 								<table>
 									<caption>People 2</caption>
 									<tr>
				 						<td>
				 							<input type="text" name="name2"	required>
				 						</td>
				 					</tr>
				 					<tr>
				 						<td>
				 							<input type="text" name="birthday2" placeholder="1995-01-13"	required>
				 						</td>
				 					</tr>
 								</table>
 							</td>
 						</tr>
 						<tr>
 							<td>
 								<input type="submit" name="submit2" value="Xac nhan">
 							</td>
 						</tr>
 						<tr>
 							<td>
 								<?php
 									if(isset($_POST["submit2"])){
 									
 										$name1=$_POST["name1"];
 										$name2=$_POST["name2"];
 										$birthday1=strtotime($_POST["birthday1"]);

 										$birthday2=strtotime($_POST["birthday2"]);
 										if(!isDate($_POST["birthday1"]) || !isDate($_POST["birthday1"]))
 											echo "<p style='color:red'>Ngay ban nhap khong dung dinh dang</p>" ;
 										else{
											echo "<p><b>People1</b> 's birthday:<b>".date("D,j F,Y",$birthday1)."</b> and <b>".(date("Y")-date("Y",$birthday1))."</b> year olds";
											echo "<p><b>People2</b> 's birthday:<b>".date("D,j F,Y",$birthday2)."</b> and <b>".(date("Y")-date("Y",$birthday2))."</b> year olds";
											echo "<p>Difference in days:<b>".ceil(abs(($birthday2-$birthday1)/(60 * 60 * 24)))."</b> days";
											echo "<p>Difference  years:<b>".abs(date("Y",$birthday2)-date("Y",$birthday1));
 										}

 								}
 								 ?>
 							</td>
 						</tr>
 					</table>
 				</form>
 			</td>
 		</tr>
 	</table>
 	
 </div>