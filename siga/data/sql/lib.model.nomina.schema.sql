
ALTER TABLE "npbonocont" ALTER COLUMN diauti TYPE numeric(10,5);
        
ALTER TABLE "npbonocont" ALTER COLUMN diavac TYPE numeric(10,5);
        
ALTER TABLE "npbonocont" ALTER COLUMN diapro TYPE numeric(10,5);
        
  ALTER TABLE "npconsalint" ADD CONSTRAINT "npconsalint_FK_1" FOREIGN KEY ("codnom") REFERENCES "npnomina" ("codnom");
  
  ALTER TABLE "npconsalint" ADD CONSTRAINT "npconsalint_FK_2" FOREIGN KEY ("codcon") REFERENCES "npdefcpt" ("codcon");
  
ALTER TABLE "npinffam" ALTER COLUMN porseghcm TYPE numeric(3,2);
        
  ALTER TABLE "npprocar" ADD CONSTRAINT "npprocar_FK_1" FOREIGN KEY ("codprofes") REFERENCES "npprofesion" ("codprofes");
  
  ALTER TABLE "npprocar" ADD CONSTRAINT "npprocar_FK_2" FOREIGN KEY ("codcar") REFERENCES "npcargos" ("codcar");
  
ALTER TABLE "npdefespparpre" ALTER COLUMN factorbonfinanofra TYPE numeric(14,2);
        
  ALTER TABLE "npconsalintfid" ADD CONSTRAINT "npconsalintfid_FK_1" FOREIGN KEY ("codnom") REFERENCES "npnomina" ("codnom");
  
  ALTER TABLE "npconsalintfid" ADD CONSTRAINT "npconsalintfid_FK_2" FOREIGN KEY ("codcon") REFERENCES "npdefcpt" ("codcon");
  