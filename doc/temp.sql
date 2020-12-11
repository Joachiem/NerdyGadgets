use nerdygadgets;
DELIMITER //
create or replace trigger bu_coldroomtemperatures
	before update on coldroomtemperatures
	for each row
		begin
			INSERT INTO `coldroomtemperatures_archive`(`ColdRoomTemperatureID`, `ColdRoomSensorNumber`, `RecordedWhen`, `Temperature`, `ValidFrom`, `ValidTo`) VALUES (old.ColdRoomTemperatureID, old.ColdRoomSensorNumber, old.RecordedWhen, old.Temperature, old.ValidFrom, old.ValidTo);
		end;

//
DELIMITER ;