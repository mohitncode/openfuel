<!DOCTYPE html>
<html>
	<head>
		<title>Openfuel | My Participations</title>
		<?php
			
			$this->load->view('includes/normalize');
			$this->load->view('includes/foundation');
			
		?>
	</head>
	
	<body>
		<?php
			
			$this->load->view('navigation');
			
		?>
		
		<table>
			<thead>
				<tr>
					<th width="80">Event ID</th>
					<th width="140">Event Name</th>
					<th width="300">Event Description</th>
					<th width="150">Project Name</th>
					<th width="120">Applicant ID</th>
					<th width="150">Applicant Name</th>
					<th width="150">Applicant Image</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($participations as $participation) { ?>
				<tr>
					<td><?php echo $participation['event_id']; ?></td>
					<td><?php echo $participation['event_name']; ?></td>
					<td><?php echo $participation['event_description']; ?></td>
					<td><?php echo $participation['project_name']; ?></td>
					<td><?php echo $participation['applicant_id']; ?></td>
					<td><?php echo $participation['applicant_name']; ?></td>
					<td><img src="<?php echo $participation['applicant_image']; ?>" width="100" height="100" /></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</body>
</html>							