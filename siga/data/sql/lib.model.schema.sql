
ALTER TABLE "viaregdetsolvia" ALTER COLUMN num_dia TYPE numeric(2);
        
  ALTER TABLE "ocestado" ADD CONSTRAINT "ocestado_FK_1" FOREIGN KEY ("codpai") REFERENCES "ocpais" ("codpai");
  
  ALTER TABLE "ocmunici" ADD CONSTRAINT "ocmunici_FK_1" FOREIGN KEY ("codpai") REFERENCES "ocpais" ("codpai");
  
  ALTER TABLE "ocmunici" ADD CONSTRAINT "ocmunici_FK_2" FOREIGN KEY ("codedo") REFERENCES "ocestado" ("codedo");
  
  ALTER TABLE "ocmunici" ADD CONSTRAINT "ocmunici_FK_3" FOREIGN KEY ("codciu") REFERENCES "occiudad" ("codciu");
  
ALTER TABLE "octartip" ALTER COLUMN numniv TYPE numeric(4);
        
  ALTER TABLE "occiudad" ADD CONSTRAINT "occiudad_FK_1" FOREIGN KEY ("codpai") REFERENCES "ocpais" ("codpai");
  
  ALTER TABLE "occiudad" ADD CONSTRAINT "occiudad_FK_2" FOREIGN KEY ("codedo") REFERENCES "ocestado" ("codedo");
  
ALTER TABLE "rhdefcur" ALTER COLUMN durcur TYPE numeric(14);
        
ALTER TABLE "cobtipdes" ALTER COLUMN diades TYPE numeric(14);
        
ALTER TABLE "cobtiprec" ALTER COLUMN diarec TYPE numeric(14);
        
ALTER TABLE "numeros" ALTER COLUMN num TYPE numeric(3);
        
ALTER TABLE "numeros" ALTER COLUMN pos TYPE numeric(3);
        
ALTER TABLE "numerosnew" ALTER COLUMN num TYPE numeric(3);
        
ALTER TABLE "numerosnew" ALTER COLUMN pos TYPE numeric(3);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN nivproacc TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN desproacc TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN hasproacc TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN lonproacc TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN nivaccesp TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN desaccesp TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN hasaccesp TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN lonaccesp TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN nivsubaccesp TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN dessubaccesp TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN hassubaccesp TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN lonsubaccesp TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN nivuae TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN desuae TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN hasuae TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN lonuae TYPE numeric(2);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN corest TYPE numeric(3);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN corsec TYPE numeric(3);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN corequ TYPE numeric(3);
        
ALTER TABLE "fordefegrgen" ALTER COLUMN porivafor TYPE numeric(5);
        
ALTER TABLE "fordefniv" ALTER COLUMN loncod TYPE numeric(2);
        
ALTER TABLE "fordefniv" ALTER COLUMN rupcat TYPE numeric(2);
        
ALTER TABLE "fordefniv" ALTER COLUMN ruppar TYPE numeric(2);
        
ALTER TABLE "fordefniv" ALTER COLUMN nivdis TYPE numeric(2);
        
ALTER TABLE "fordefniv" ALTER COLUMN numper TYPE numeric(2);
        
ALTER TABLE "fordefniv" ALTER COLUMN nivobr TYPE numeric(2);
        
ALTER TABLE "forniveles" ALTER COLUMN consec TYPE numeric(2);
        
ALTER TABLE "forniveles" ALTER COLUMN lonniv TYPE numeric(2);
        
  ALTER TABLE "forprocar" ADD CONSTRAINT "forprocar_FK_1" FOREIGN KEY ("codcar") REFERENCES "forcargos" ("codcar");
  
ALTER TABLE "foringdefniv" ALTER COLUMN loncod TYPE numeric(2);
        
ALTER TABLE "foringdefniv" ALTER COLUMN rupcat TYPE numeric(2);
        
ALTER TABLE "foringdefniv" ALTER COLUMN ruppar TYPE numeric(2);
        
ALTER TABLE "foringdefniv" ALTER COLUMN nivdis TYPE numeric(2);
        
ALTER TABLE "foringdefniv" ALTER COLUMN numper TYPE numeric(2);
        
ALTER TABLE "foringdefniv" ALTER COLUMN nivobr TYPE numeric(2);
        
ALTER TABLE "foringniveles" ALTER COLUMN consec TYPE numeric(2);
        
ALTER TABLE "foringniveles" ALTER COLUMN lonniv TYPE numeric(2);
        
ALTER TABLE "forregart" ALTER COLUMN codclaart TYPE numeric(4);
        
ALTER TABLE "forcormun" ALTER COLUMN cormun TYPE numeric(3);
        
ALTER TABLE "forcorpar" ALTER COLUMN corpar TYPE numeric(3);
        
ALTER TABLE "forcorsubobj" ALTER COLUMN corsubobj TYPE numeric(3);
        
ALTER TABLE "forcorsubsec" ALTER COLUMN corsubsec TYPE numeric(3);
        
ALTER TABLE "forcorsubsubobj" ALTER COLUMN corsubsubobj TYPE numeric(3);
        
ALTER TABLE "bnregmue" ALTER COLUMN desmue TYPE character varying(250);
        
  ALTER TABLE "bnmunicip" ADD CONSTRAINT "bnmunicip_FK_1" FOREIGN KEY ("bnestado_codest") REFERENCES "bnestado" ("codest") ON UPDATE RESTRICT ON DELETE RESTRICT;
  
ALTER TABLE "empresa" ALTER COLUMN nomemp TYPE character varying(250);
        
ALTER TABLE "empresa" ALTER COLUMN diremp TYPE character varying(50);
        
ALTER TABLE "opbenefi" ALTER COLUMN dirben TYPE character varying(100);
        
  ALTER TABLE "opordpag" ADD CONSTRAINT "opordpag_FK_1" FOREIGN KEY ("cedrif") REFERENCES "opbenefi" ("cedrif");
  
  ALTER TABLE "tsdeffonant" ADD CONSTRAINT "tsdeffonant_FK_1" FOREIGN KEY ("unieje") REFERENCES "bnubica" ("codubi");
  
  ALTER TABLE "tsdeffonant" ADD CONSTRAINT "tsdeffonant_FK_2" FOREIGN KEY ("coduniadm") REFERENCES "tsuniadm" ("coduniadm");
  
  ALTER TABLE "tsdeffonant" ADD CONSTRAINT "tsdeffonant_FK_3" FOREIGN KEY ("cedrif") REFERENCES "opbenefi" ("cedrif");
  
  ALTER TABLE "tsdeffonant" ADD CONSTRAINT "tsdeffonant_FK_4" FOREIGN KEY ("codcat") REFERENCES "npcatpre" ("codcat");
  
  ALTER TABLE "opsolpag" ADD CONSTRAINT "opsolpag_FK_1" FOREIGN KEY ("refcom") REFERENCES "cpcompro" ("refcom");
  
  ALTER TABLE "opdetsolpag" ADD CONSTRAINT "opdetsolpag_FK_1" FOREIGN KEY ("refsol") REFERENCES "opsolpag" ("refsol");
  
  ALTER TABLE "opdetsolpag" ADD CONSTRAINT "opdetsolpag_FK_2" FOREIGN KEY ("reford") REFERENCES "opordpag" ("numord");
  
  ALTER TABLE "opdetsolpag" ADD CONSTRAINT "opdetsolpag_FK_3" FOREIGN KEY ("refcom") REFERENCES "cpcompro" ("refcom");
  
  ALTER TABLE "opregfac" ADD CONSTRAINT "opregfac_FK_1" FOREIGN KEY ("cedrif") REFERENCES "opbenefi" ("cedrif");
  