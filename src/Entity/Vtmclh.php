<?php

namespace App\Entity;

use App\Model\ClientesDikterInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vtmclh
 *
 * @ORM\Table(name="VTMCLH")
 * @ORM\Entity
 */
class Vtmclh implements ClientesDikterInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="VTMCLH_NROCTA", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $vtmclhNrocta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_RUBR01", type="string", length=20, nullable=true)
     */
    private $vtmclhRubr01;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_RUBR03", type="string", length=20, nullable=true)
     */
    private $vtmclhRubr03;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_RUBR04", type="string", length=20, nullable=true)
     */
    private $vtmclhRubr04;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_RUBR05", type="string", length=20, nullable=true)
     */
    private $vtmclhRubr05;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_RUBR06", type="string", length=20, nullable=true)
     */
    private $vtmclhRubr06;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_RUBR07", type="string", length=20, nullable=true)
     */
    private $vtmclhRubr07;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_RUBR08", type="string", length=20, nullable=true)
     */
    private $vtmclhRubr08;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_RUBR09", type="string", length=20, nullable=true)
     */
    private $vtmclhRubr09;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_RUBR10", type="string", length=20, nullable=true)
     */
    private $vtmclhRubr10;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_RUBR02", type="string", length=20, nullable=true)
     */
    private $vtmclhRubr02;

    /**
     * @var string
     *
     * @ORM\Column(name="VTMCLH_NOMBRE", type="string", length=150, nullable=false)
     */
    private $vtmclhNombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NROSUB", type="string", length=20, nullable=true)
     */
    private $vtmclhNrosub;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_RESPON", type="string", length=60, nullable=true)
     */
    private $vtmclhRespon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DIRECC", type="string", length=255, nullable=true)
     */
    private $vtmclhDirecc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NUMERO", type="string", length=6, nullable=true)
     */
    private $vtmclhNumero;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DPPISO", type="string", length=6, nullable=true)
     */
    private $vtmclhDppiso;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DEPTOS", type="string", length=6, nullable=true)
     */
    private $vtmclhDeptos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CODFIL", type="string", length=6, nullable=true)
     */
    private $vtmclhCodfil;

    /**
     * @var string
     *
     * @ORM\Column(name="VTMCLH_CODPAI", type="string", length=3, nullable=false)
     */
    private $vtmclhCodpai;

    /**
     * @var string
     *
     * @ORM\Column(name="VTMCLH_CODPOS", type="string", length=10, nullable=false)
     */
    private $vtmclhCodpos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_MUNICP", type="string", length=6, nullable=true)
     */
    private $vtmclhMunicp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_FLETES", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhFletes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TELEFN", type="string", length=30, nullable=true)
     */
    private $vtmclhTelefn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NROFAX", type="string", length=20, nullable=true)
     */
    private $vtmclhNrofax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NTELEX", type="string", length=15, nullable=true)
     */
    private $vtmclhNtelex;

    /**
     * @var string
     *
     * @ORM\Column(name="VTMCLH_CNDIVA", type="string", length=6, nullable=false)
     */
    private $vtmclhCndiva;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TIPDOC", type="string", length=4, nullable=true)
     */
    private $vtmclhTipdoc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NRODOC", type="string", length=50, nullable=true)
     */
    private $vtmclhNrodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="VTMCLH_VNDDOR", type="string", length=6, nullable=false)
     */
    private $vtmclhVnddor;

    /**
     * @var string
     *
     * @ORM\Column(name="VTMCLH_COBRAD", type="string", length=6, nullable=false)
     */
    private $vtmclhCobrad;

    /**
     * @var string
     *
     * @ORM\Column(name="VTMCLH_JURISD", type="string", length=6, nullable=false)
     */
    private $vtmclhJurisd;

    /**
     * @var string
     *
     * @ORM\Column(name="VTMCLH_CODZON", type="string", length=6, nullable=false)
     */
    private $vtmclhCodzon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_ACTIVD", type="string", length=6, nullable=true)
     */
    private $vtmclhActivd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CATEGO", type="string", length=6, nullable=true)
     */
    private $vtmclhCatego;

    /**
     * @var string
     *
     * @ORM\Column(name="VTMCLH_CNDPAG", type="string", length=6, nullable=false)
     */
    private $vtmclhCndpag;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CNDPRE", type="string", length=10, nullable=true, options={"fixed"=true})
     */
    private $vtmclhCndpre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CODCRD", type="string", length=6, nullable=true)
     */
    private $vtmclhCodcrd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_GRUBON", type="string", length=6, nullable=true)
     */
    private $vtmclhGrubon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CAMION", type="string", length=6, nullable=true)
     */
    private $vtmclhCamion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CAMALT", type="string", length=6, nullable=true)
     */
    private $vtmclhCamalt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TRACOD", type="string", length=6, nullable=true)
     */
    private $vtmclhTracod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DIREP1", type="string", length=2, nullable=true)
     */
    private $vtmclhDirep1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DIREP2", type="string", length=2, nullable=true)
     */
    private $vtmclhDirep2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DIREP3", type="string", length=2, nullable=true)
     */
    private $vtmclhDirep3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DIREP4", type="string", length=2, nullable=true)
     */
    private $vtmclhDirep4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DIREP5", type="string", length=2, nullable=true)
     */
    private $vtmclhDirep5;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_HORREC", type="string", length=20, nullable=true)
     */
    private $vtmclhHorrec;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DIRENT", type="string", length=255, nullable=true)
     */
    private $vtmclhDirent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_PAIENT", type="string", length=3, nullable=true)
     */
    private $vtmclhPaient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CODENT", type="string", length=10, nullable=true)
     */
    private $vtmclhCodent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_JURENT", type="string", length=6, nullable=true)
     */
    private $vtmclhJurent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_ZONENT", type="string", length=6, nullable=true)
     */
    private $vtmclhZonent;

    /**
     * @var int
     *
     * @ORM\Column(name="VTMCLH_COPIVT", type="smallint", nullable=false)
     */
    private $vtmclhCopivt;

    /**
     * @var int
     *
     * @ORM\Column(name="VTMCLH_COPIFC", type="smallint", nullable=false)
     */
    private $vtmclhCopifc;

    /**
     * @var int
     *
     * @ORM\Column(name="VTMCLH_COPIST", type="smallint", nullable=false)
     */
    private $vtmclhCopist;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TEXTOS", type="text", length=16, nullable=true)
     */
    private $vtmclhTextos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TIPDO1", type="string", length=4, nullable=true)
     */
    private $vtmclhTipdo1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NRODO1", type="string", length=50, nullable=true)
     */
    private $vtmclhNrodo1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TIPDO2", type="string", length=4, nullable=true)
     */
    private $vtmclhTipdo2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NRODO2", type="string", length=50, nullable=true)
     */
    private $vtmclhNrodo2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TIPDO3", type="string", length=4, nullable=true)
     */
    private $vtmclhTipdo3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NRODO3", type="string", length=50, nullable=true)
     */
    private $vtmclhNrodo3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TIPDO4", type="string", length=4, nullable=true)
     */
    private $vtmclhTipdo4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NRODO4", type="string", length=50, nullable=true)
     */
    private $vtmclhNrodo4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TIPDO5", type="string", length=4, nullable=true)
     */
    private $vtmclhTipdo5;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NRODO5", type="string", length=50, nullable=true)
     */
    private $vtmclhNrodo5;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DIREML", type="string", length=60, nullable=true)
     */
    private $vtmclhDireml;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_SEGPRO", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhSegpro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CONTAD", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhContad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_EDISUB", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhEdisub;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CUENTA", type="string", length=40, nullable=true)
     */
    private $vtmclhCuenta;

    /**
     * @var int|null
     *
     * @ORM\Column(name="VTMCLH_MAXITM", type="smallint", nullable=true)
     */
    private $vtmclhMaxitm;

    /**
     * @var int|null
     *
     * @ORM\Column(name="VTMCLH_DIFDIA", type="smallint", nullable=true)
     */
    private $vtmclhDifdia;

//    /**
//     * @var \DateTime|null
//     *
//     * @ORM\Column(name="VTMCLH_DIFDES", type="datetime", nullable=true)
//     */
//    private $vtmclhDifdes;
//
//    /**
//     * @var \DateTime|null
//     *
//     * @ORM\Column(name="VTMCLH_DIFHAS", type="datetime", nullable=true)
//     */
//    private $vtmclhDifhas;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_PERINA", type="decimal", precision=6, scale=0, nullable=true)
     */
    private $vtmclhPerina;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_IMPDIF", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $vtmclhImpdif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_EMAIL", type="string", length=60, nullable=true)
     */
    private $vtmclhEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CNDINT", type="string", length=6, nullable=true)
     */
    private $vtmclhCndint;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DISTRI", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhDistri;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DEPOSI", type="string", length=15, nullable=true)
     */
    private $vtmclhDeposi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_SECTOR", type="string", length=15, nullable=true)
     */
    private $vtmclhSector;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NRODIS", type="string", length=20, nullable=true)
     */
    private $vtmclhNrodis;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_OLEOLE", type="text", length=16, nullable=true)
     */
    private $vtmclhOleole;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_BMPBMP", type="string", length=255, nullable=true)
     */
    private $vtmclhBmpbmp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_INHIBE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhInhibe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_PRMXPR", type="decimal", precision=15, scale=7, nullable=true)
     */
    private $vtmclhPrmxpr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_PRMIPR", type="decimal", precision=15, scale=7, nullable=true)
     */
    private $vtmclhPrmipr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TRAFCR", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhTrafcr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CODCOF", type="string", length=6, nullable=true)
     */
    private $vtmclhCodcof;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_MODCPT", type="string", length=2, nullable=true)
     */
    private $vtmclhModcpt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TIPCPT", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhTipcpt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CODCPT", type="string", length=6, nullable=true)
     */
    private $vtmclhCodcpt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_LISCLI", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhLiscli;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TIPOPR", type="string", length=6, nullable=true)
     */
    private $vtmclhTipopr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CODOPR", type="string", length=30, nullable=true)
     */
    private $vtmclhCodopr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_MODPAG", type="string", length=2, nullable=true)
     */
    private $vtmclhModpag;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_TIPPAG", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhTippag;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_MEDPAG", type="string", length=6, nullable=true)
     */
    private $vtmclhMedpag;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_LANEXP", type="string", length=1, nullable=true)
     */
    private $vtmclhLanexp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_GENXML", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhGenxml;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_GLNDES", type="string", length=15, nullable=true)
     */
    private $vtmclhGlndes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CODEXP", type="string", length=6, nullable=true)
     */
    private $vtmclhCodexp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_OBLCON", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhOblcon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DEPTRA", type="string", length=15, nullable=true)
     */
    private $vtmclhDeptra;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_SECTRA", type="string", length=15, nullable=true)
     */
    private $vtmclhSectra;

    /**
     * @var string
     *
     * @ORM\Column(name="VTMCLH_FISJUR", type="string", length=1, nullable=false)
     */
    private $vtmclhFisjur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_APELL1", type="string", length=60, nullable=true)
     */
    private $vtmclhApell1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_APELL2", type="string", length=60, nullable=true)
     */
    private $vtmclhApell2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NOMB01", type="string", length=60, nullable=true)
     */
    private $vtmclhNomb01;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_NOMB02", type="string", length=60, nullable=true)
     */
    private $vtmclhNomb02;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USR_VTMCLH_LOCPRO", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $usrVtmclhLocpro;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USR_VTMCLH_CODARE", type="string", length=6, nullable=true)
     */
    private $usrVtmclhCodare;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USR_VTMCLH_TIENDA", type="string", length=1, nullable=true)
     */
    private $usrVtmclhTienda;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USR_VTMCLH_DEPO", type="string", length=6, nullable=true)
     */
    private $usrVtmclhDepo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USR_VTMCLH_GRPTAN", type="string", length=20, nullable=true)
     */
    private $usrVtmclhGrptan;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USR_VTMCLH_REFCLI", type="string", length=6, nullable=true)
     */
    private $usrVtmclhRefcli;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USR_VTMCLH_CODEMP", type="string", length=6, nullable=true)
     */
    private $usrVtmclhCodemp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USR_VTMCLH_REFLOC", type="string", length=6, nullable=true)
     */
    private $usrVtmclhRefloc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USR_VTMCLH_ESTCOM", type="string", length=2, nullable=true)
     */
    private $usrVtmclhEstcom;

//    /**
//     * @var \DateTime|null
//     *
//     * @ORM\Column(name="VTMCLH_FECALT", type="datetime", nullable=true)
//     */
//    private $vtmclhFecalt;
//
//    /**
//     * @var \DateTime|null
//     *
//     * @ORM\Column(name="VTMCLH_FECMOD", type="datetime", nullable=true)
//     */
//    private $vtmclhFecmod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_USERID", type="string", length=64, nullable=true)
     */
    private $vtmclhUserid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_ULTOPR", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhUltopr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_DEBAJA", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $vtmclhDebaja;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_HORMOV", type="string", length=10, nullable=true)
     */
    private $vtmclhHormov;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_MODULE", type="string", length=10, nullable=true)
     */
    private $vtmclhModule;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_OALIAS", type="string", length=10, nullable=true)
     */
    private $vtmclhOalias;

//    /**
//     * @var \DateTime|null
//     *
//     * @ORM\Column(name="VTMCLH_TSTAMP", type="datetime", nullable=true)
//     */
//    private $vtmclhTstamp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_LOTTRA", type="string", length=6, nullable=true)
     */
    private $vtmclhLottra;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_LOTREC", type="string", length=6, nullable=true)
     */
    private $vtmclhLotrec;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_LOTORI", type="string", length=6, nullable=true)
     */
    private $vtmclhLotori;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_SYSVER", type="string", length=10, nullable=true)
     */
    private $vtmclhSysver;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VTMCLH_CMPVER", type="string", length=10, nullable=true)
     */
    private $vtmclhCmpver;

    /**
     * @return string
     */
    public function getVtmclhNrocta(): string
    {
        return $this->vtmclhNrocta;
    }

    /**
     * @param string $vtmclhNrocta
     * @return Vtmclh
     */
    public function setVtmclhNrocta(string $vtmclhNrocta): Vtmclh
    {
        $this->vtmclhNrocta = $vtmclhNrocta;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhRubr01(): ?string
    {
        return $this->vtmclhRubr01;
    }

    /**
     * @param string|null $vtmclhRubr01
     * @return Vtmclh
     */
    public function setVtmclhRubr01(?string $vtmclhRubr01): Vtmclh
    {
        $this->vtmclhRubr01 = $vtmclhRubr01;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhRubr03(): ?string
    {
        return $this->vtmclhRubr03;
    }

    /**
     * @param string|null $vtmclhRubr03
     * @return Vtmclh
     */
    public function setVtmclhRubr03(?string $vtmclhRubr03): Vtmclh
    {
        $this->vtmclhRubr03 = $vtmclhRubr03;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhRubr04(): ?string
    {
        return $this->vtmclhRubr04;
    }

    /**
     * @param string|null $vtmclhRubr04
     * @return Vtmclh
     */
    public function setVtmclhRubr04(?string $vtmclhRubr04): Vtmclh
    {
        $this->vtmclhRubr04 = $vtmclhRubr04;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhRubr05(): ?string
    {
        return $this->vtmclhRubr05;
    }

    /**
     * @param string|null $vtmclhRubr05
     * @return Vtmclh
     */
    public function setVtmclhRubr05(?string $vtmclhRubr05): Vtmclh
    {
        $this->vtmclhRubr05 = $vtmclhRubr05;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhRubr06(): ?string
    {
        return $this->vtmclhRubr06;
    }

    /**
     * @param string|null $vtmclhRubr06
     * @return Vtmclh
     */
    public function setVtmclhRubr06(?string $vtmclhRubr06): Vtmclh
    {
        $this->vtmclhRubr06 = $vtmclhRubr06;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhRubr07(): ?string
    {
        return $this->vtmclhRubr07;
    }

    /**
     * @param string|null $vtmclhRubr07
     * @return Vtmclh
     */
    public function setVtmclhRubr07(?string $vtmclhRubr07): Vtmclh
    {
        $this->vtmclhRubr07 = $vtmclhRubr07;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhRubr08(): ?string
    {
        return $this->vtmclhRubr08;
    }

    /**
     * @param string|null $vtmclhRubr08
     * @return Vtmclh
     */
    public function setVtmclhRubr08(?string $vtmclhRubr08): Vtmclh
    {
        $this->vtmclhRubr08 = $vtmclhRubr08;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhRubr09(): ?string
    {
        return $this->vtmclhRubr09;
    }

    /**
     * @param string|null $vtmclhRubr09
     * @return Vtmclh
     */
    public function setVtmclhRubr09(?string $vtmclhRubr09): Vtmclh
    {
        $this->vtmclhRubr09 = $vtmclhRubr09;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhRubr10(): ?string
    {
        return $this->vtmclhRubr10;
    }

    /**
     * @param string|null $vtmclhRubr10
     * @return Vtmclh
     */
    public function setVtmclhRubr10(?string $vtmclhRubr10): Vtmclh
    {
        $this->vtmclhRubr10 = $vtmclhRubr10;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhRubr02(): ?string
    {
        return $this->vtmclhRubr02;
    }

    /**
     * @param string|null $vtmclhRubr02
     * @return Vtmclh
     */
    public function setVtmclhRubr02(?string $vtmclhRubr02): Vtmclh
    {
        $this->vtmclhRubr02 = $vtmclhRubr02;
        return $this;
    }

    /**
     * @return string
     */
    public function getVtmclhNombre(): string
    {
        return $this->vtmclhNombre;
    }

    /**
     * @param string $vtmclhNombre
     * @return Vtmclh
     */
    public function setVtmclhNombre(string $vtmclhNombre): Vtmclh
    {
        $this->vtmclhNombre = $vtmclhNombre;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNrosub(): ?string
    {
        return $this->vtmclhNrosub;
    }

    /**
     * @param string|null $vtmclhNrosub
     * @return Vtmclh
     */
    public function setVtmclhNrosub(?string $vtmclhNrosub): Vtmclh
    {
        $this->vtmclhNrosub = $vtmclhNrosub;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhRespon(): ?string
    {
        return $this->vtmclhRespon;
    }

    /**
     * @param string|null $vtmclhRespon
     * @return Vtmclh
     */
    public function setVtmclhRespon(?string $vtmclhRespon): Vtmclh
    {
        $this->vtmclhRespon = $vtmclhRespon;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDirecc(): ?string
    {
        return $this->vtmclhDirecc;
    }

    /**
     * @param string|null $vtmclhDirecc
     * @return Vtmclh
     */
    public function setVtmclhDirecc(?string $vtmclhDirecc): Vtmclh
    {
        $this->vtmclhDirecc = $vtmclhDirecc;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNumero(): ?string
    {
        return $this->vtmclhNumero;
    }

    /**
     * @param string|null $vtmclhNumero
     * @return Vtmclh
     */
    public function setVtmclhNumero(?string $vtmclhNumero): Vtmclh
    {
        $this->vtmclhNumero = $vtmclhNumero;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDppiso(): ?string
    {
        return $this->vtmclhDppiso;
    }

    /**
     * @param string|null $vtmclhDppiso
     * @return Vtmclh
     */
    public function setVtmclhDppiso(?string $vtmclhDppiso): Vtmclh
    {
        $this->vtmclhDppiso = $vtmclhDppiso;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDeptos(): ?string
    {
        return $this->vtmclhDeptos;
    }

    /**
     * @param string|null $vtmclhDeptos
     * @return Vtmclh
     */
    public function setVtmclhDeptos(?string $vtmclhDeptos): Vtmclh
    {
        $this->vtmclhDeptos = $vtmclhDeptos;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCodfil(): ?string
    {
        return $this->vtmclhCodfil;
    }

    /**
     * @param string|null $vtmclhCodfil
     * @return Vtmclh
     */
    public function setVtmclhCodfil(?string $vtmclhCodfil): Vtmclh
    {
        $this->vtmclhCodfil = $vtmclhCodfil;
        return $this;
    }

    /**
     * @return string
     */
    public function getVtmclhCodpai(): string
    {
        return $this->vtmclhCodpai;
    }

    /**
     * @param string $vtmclhCodpai
     * @return Vtmclh
     */
    public function setVtmclhCodpai(string $vtmclhCodpai): Vtmclh
    {
        $this->vtmclhCodpai = $vtmclhCodpai;
        return $this;
    }

    /**
     * @return string
     */
    public function getVtmclhCodpos(): string
    {
        return $this->vtmclhCodpos;
    }

    /**
     * @param string $vtmclhCodpos
     * @return Vtmclh
     */
    public function setVtmclhCodpos(string $vtmclhCodpos): Vtmclh
    {
        $this->vtmclhCodpos = $vtmclhCodpos;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhMunicp(): ?string
    {
        return $this->vtmclhMunicp;
    }

    /**
     * @param string|null $vtmclhMunicp
     * @return Vtmclh
     */
    public function setVtmclhMunicp(?string $vtmclhMunicp): Vtmclh
    {
        $this->vtmclhMunicp = $vtmclhMunicp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhFletes(): ?string
    {
        return $this->vtmclhFletes;
    }

    /**
     * @param string|null $vtmclhFletes
     * @return Vtmclh
     */
    public function setVtmclhFletes(?string $vtmclhFletes): Vtmclh
    {
        $this->vtmclhFletes = $vtmclhFletes;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTelefn(): ?string
    {
        return $this->vtmclhTelefn;
    }

    /**
     * @param string|null $vtmclhTelefn
     * @return Vtmclh
     */
    public function setVtmclhTelefn(?string $vtmclhTelefn): Vtmclh
    {
        $this->vtmclhTelefn = $vtmclhTelefn;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNrofax(): ?string
    {
        return $this->vtmclhNrofax;
    }

    /**
     * @param string|null $vtmclhNrofax
     * @return Vtmclh
     */
    public function setVtmclhNrofax(?string $vtmclhNrofax): Vtmclh
    {
        $this->vtmclhNrofax = $vtmclhNrofax;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNtelex(): ?string
    {
        return $this->vtmclhNtelex;
    }

    /**
     * @param string|null $vtmclhNtelex
     * @return Vtmclh
     */
    public function setVtmclhNtelex(?string $vtmclhNtelex): Vtmclh
    {
        $this->vtmclhNtelex = $vtmclhNtelex;
        return $this;
    }

    /**
     * @return string
     */
    public function getVtmclhCndiva(): string
    {
        return $this->vtmclhCndiva;
    }

    /**
     * @param string $vtmclhCndiva
     * @return Vtmclh
     */
    public function setVtmclhCndiva(string $vtmclhCndiva): Vtmclh
    {
        $this->vtmclhCndiva = $vtmclhCndiva;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTipdoc(): ?string
    {
        return $this->vtmclhTipdoc;
    }

    /**
     * @param string|null $vtmclhTipdoc
     * @return Vtmclh
     */
    public function setVtmclhTipdoc(?string $vtmclhTipdoc): Vtmclh
    {
        $this->vtmclhTipdoc = $vtmclhTipdoc;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNrodoc(): ?string
    {
        return $this->vtmclhNrodoc;
    }

    /**
     * @param string|null $vtmclhNrodoc
     * @return Vtmclh
     */
    public function setVtmclhNrodoc(?string $vtmclhNrodoc): Vtmclh
    {
        $this->vtmclhNrodoc = $vtmclhNrodoc;
        return $this;
    }

    /**
     * @return string
     */
    public function getVtmclhVnddor(): string
    {
        return $this->vtmclhVnddor;
    }

    /**
     * @param string $vtmclhVnddor
     * @return Vtmclh
     */
    public function setVtmclhVnddor(string $vtmclhVnddor): Vtmclh
    {
        $this->vtmclhVnddor = $vtmclhVnddor;
        return $this;
    }

    /**
     * @return string
     */
    public function getVtmclhCobrad(): string
    {
        return $this->vtmclhCobrad;
    }

    /**
     * @param string $vtmclhCobrad
     * @return Vtmclh
     */
    public function setVtmclhCobrad(string $vtmclhCobrad): Vtmclh
    {
        $this->vtmclhCobrad = $vtmclhCobrad;
        return $this;
    }

    /**
     * @return string
     */
    public function getVtmclhJurisd(): string
    {
        return $this->vtmclhJurisd;
    }

    /**
     * @param string $vtmclhJurisd
     * @return Vtmclh
     */
    public function setVtmclhJurisd(string $vtmclhJurisd): Vtmclh
    {
        $this->vtmclhJurisd = $vtmclhJurisd;
        return $this;
    }

    /**
     * @return string
     */
    public function getVtmclhCodzon(): string
    {
        return $this->vtmclhCodzon;
    }

    /**
     * @param string $vtmclhCodzon
     * @return Vtmclh
     */
    public function setVtmclhCodzon(string $vtmclhCodzon): Vtmclh
    {
        $this->vtmclhCodzon = $vtmclhCodzon;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhActivd(): ?string
    {
        return $this->vtmclhActivd;
    }

    /**
     * @param string|null $vtmclhActivd
     * @return Vtmclh
     */
    public function setVtmclhActivd(?string $vtmclhActivd): Vtmclh
    {
        $this->vtmclhActivd = $vtmclhActivd;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCatego(): ?string
    {
        return $this->vtmclhCatego;
    }

    /**
     * @param string|null $vtmclhCatego
     * @return Vtmclh
     */
    public function setVtmclhCatego(?string $vtmclhCatego): Vtmclh
    {
        $this->vtmclhCatego = $vtmclhCatego;
        return $this;
    }

    /**
     * @return string
     */
    public function getVtmclhCndpag(): string
    {
        return $this->vtmclhCndpag;
    }

    /**
     * @param string $vtmclhCndpag
     * @return Vtmclh
     */
    public function setVtmclhCndpag(string $vtmclhCndpag): Vtmclh
    {
        $this->vtmclhCndpag = $vtmclhCndpag;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCndpre(): ?string
    {
        return $this->vtmclhCndpre;
    }

    /**
     * @param string|null $vtmclhCndpre
     * @return Vtmclh
     */
    public function setVtmclhCndpre(?string $vtmclhCndpre): Vtmclh
    {
        $this->vtmclhCndpre = $vtmclhCndpre;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCodcrd(): ?string
    {
        return $this->vtmclhCodcrd;
    }

    /**
     * @param string|null $vtmclhCodcrd
     * @return Vtmclh
     */
    public function setVtmclhCodcrd(?string $vtmclhCodcrd): Vtmclh
    {
        $this->vtmclhCodcrd = $vtmclhCodcrd;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhGrubon(): ?string
    {
        return $this->vtmclhGrubon;
    }

    /**
     * @param string|null $vtmclhGrubon
     * @return Vtmclh
     */
    public function setVtmclhGrubon(?string $vtmclhGrubon): Vtmclh
    {
        $this->vtmclhGrubon = $vtmclhGrubon;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCamion(): ?string
    {
        return $this->vtmclhCamion;
    }

    /**
     * @param string|null $vtmclhCamion
     * @return Vtmclh
     */
    public function setVtmclhCamion(?string $vtmclhCamion): Vtmclh
    {
        $this->vtmclhCamion = $vtmclhCamion;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCamalt(): ?string
    {
        return $this->vtmclhCamalt;
    }

    /**
     * @param string|null $vtmclhCamalt
     * @return Vtmclh
     */
    public function setVtmclhCamalt(?string $vtmclhCamalt): Vtmclh
    {
        $this->vtmclhCamalt = $vtmclhCamalt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTracod(): ?string
    {
        return $this->vtmclhTracod;
    }

    /**
     * @param string|null $vtmclhTracod
     * @return Vtmclh
     */
    public function setVtmclhTracod(?string $vtmclhTracod): Vtmclh
    {
        $this->vtmclhTracod = $vtmclhTracod;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDirep1(): ?string
    {
        return $this->vtmclhDirep1;
    }

    /**
     * @param string|null $vtmclhDirep1
     * @return Vtmclh
     */
    public function setVtmclhDirep1(?string $vtmclhDirep1): Vtmclh
    {
        $this->vtmclhDirep1 = $vtmclhDirep1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDirep2(): ?string
    {
        return $this->vtmclhDirep2;
    }

    /**
     * @param string|null $vtmclhDirep2
     * @return Vtmclh
     */
    public function setVtmclhDirep2(?string $vtmclhDirep2): Vtmclh
    {
        $this->vtmclhDirep2 = $vtmclhDirep2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDirep3(): ?string
    {
        return $this->vtmclhDirep3;
    }

    /**
     * @param string|null $vtmclhDirep3
     * @return Vtmclh
     */
    public function setVtmclhDirep3(?string $vtmclhDirep3): Vtmclh
    {
        $this->vtmclhDirep3 = $vtmclhDirep3;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDirep4(): ?string
    {
        return $this->vtmclhDirep4;
    }

    /**
     * @param string|null $vtmclhDirep4
     * @return Vtmclh
     */
    public function setVtmclhDirep4(?string $vtmclhDirep4): Vtmclh
    {
        $this->vtmclhDirep4 = $vtmclhDirep4;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDirep5(): ?string
    {
        return $this->vtmclhDirep5;
    }

    /**
     * @param string|null $vtmclhDirep5
     * @return Vtmclh
     */
    public function setVtmclhDirep5(?string $vtmclhDirep5): Vtmclh
    {
        $this->vtmclhDirep5 = $vtmclhDirep5;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhHorrec(): ?string
    {
        return $this->vtmclhHorrec;
    }

    /**
     * @param string|null $vtmclhHorrec
     * @return Vtmclh
     */
    public function setVtmclhHorrec(?string $vtmclhHorrec): Vtmclh
    {
        $this->vtmclhHorrec = $vtmclhHorrec;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDirent(): ?string
    {
        return $this->vtmclhDirent;
    }

    /**
     * @param string|null $vtmclhDirent
     * @return Vtmclh
     */
    public function setVtmclhDirent(?string $vtmclhDirent): Vtmclh
    {
        $this->vtmclhDirent = $vtmclhDirent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhPaient(): ?string
    {
        return $this->vtmclhPaient;
    }

    /**
     * @param string|null $vtmclhPaient
     * @return Vtmclh
     */
    public function setVtmclhPaient(?string $vtmclhPaient): Vtmclh
    {
        $this->vtmclhPaient = $vtmclhPaient;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCodent(): ?string
    {
        return $this->vtmclhCodent;
    }

    /**
     * @param string|null $vtmclhCodent
     * @return Vtmclh
     */
    public function setVtmclhCodent(?string $vtmclhCodent): Vtmclh
    {
        $this->vtmclhCodent = $vtmclhCodent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhJurent(): ?string
    {
        return $this->vtmclhJurent;
    }

    /**
     * @param string|null $vtmclhJurent
     * @return Vtmclh
     */
    public function setVtmclhJurent(?string $vtmclhJurent): Vtmclh
    {
        $this->vtmclhJurent = $vtmclhJurent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhZonent(): ?string
    {
        return $this->vtmclhZonent;
    }

    /**
     * @param string|null $vtmclhZonent
     * @return Vtmclh
     */
    public function setVtmclhZonent(?string $vtmclhZonent): Vtmclh
    {
        $this->vtmclhZonent = $vtmclhZonent;
        return $this;
    }

    /**
     * @return int
     */
    public function getVtmclhCopivt(): int
    {
        return $this->vtmclhCopivt;
    }

    /**
     * @param int $vtmclhCopivt
     * @return Vtmclh
     */
    public function setVtmclhCopivt(int $vtmclhCopivt): Vtmclh
    {
        $this->vtmclhCopivt = $vtmclhCopivt;
        return $this;
    }

    /**
     * @return int
     */
    public function getVtmclhCopifc(): int
    {
        return $this->vtmclhCopifc;
    }

    /**
     * @param int $vtmclhCopifc
     * @return Vtmclh
     */
    public function setVtmclhCopifc(int $vtmclhCopifc): Vtmclh
    {
        $this->vtmclhCopifc = $vtmclhCopifc;
        return $this;
    }

    /**
     * @return int
     */
    public function getVtmclhCopist(): int
    {
        return $this->vtmclhCopist;
    }

    /**
     * @param int $vtmclhCopist
     * @return Vtmclh
     */
    public function setVtmclhCopist(int $vtmclhCopist): Vtmclh
    {
        $this->vtmclhCopist = $vtmclhCopist;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTextos(): ?string
    {
        return $this->vtmclhTextos;
    }

    /**
     * @param string|null $vtmclhTextos
     * @return Vtmclh
     */
    public function setVtmclhTextos(?string $vtmclhTextos): Vtmclh
    {
        $this->vtmclhTextos = $vtmclhTextos;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTipdo1(): ?string
    {
        return $this->vtmclhTipdo1;
    }

    /**
     * @param string|null $vtmclhTipdo1
     * @return Vtmclh
     */
    public function setVtmclhTipdo1(?string $vtmclhTipdo1): Vtmclh
    {
        $this->vtmclhTipdo1 = $vtmclhTipdo1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNrodo1(): ?string
    {
        return $this->vtmclhNrodo1;
    }

    /**
     * @param string|null $vtmclhNrodo1
     * @return Vtmclh
     */
    public function setVtmclhNrodo1(?string $vtmclhNrodo1): Vtmclh
    {
        $this->vtmclhNrodo1 = $vtmclhNrodo1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTipdo2(): ?string
    {
        return $this->vtmclhTipdo2;
    }

    /**
     * @param string|null $vtmclhTipdo2
     * @return Vtmclh
     */
    public function setVtmclhTipdo2(?string $vtmclhTipdo2): Vtmclh
    {
        $this->vtmclhTipdo2 = $vtmclhTipdo2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNrodo2(): ?string
    {
        return $this->vtmclhNrodo2;
    }

    /**
     * @param string|null $vtmclhNrodo2
     * @return Vtmclh
     */
    public function setVtmclhNrodo2(?string $vtmclhNrodo2): Vtmclh
    {
        $this->vtmclhNrodo2 = $vtmclhNrodo2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTipdo3(): ?string
    {
        return $this->vtmclhTipdo3;
    }

    /**
     * @param string|null $vtmclhTipdo3
     * @return Vtmclh
     */
    public function setVtmclhTipdo3(?string $vtmclhTipdo3): Vtmclh
    {
        $this->vtmclhTipdo3 = $vtmclhTipdo3;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNrodo3(): ?string
    {
        return $this->vtmclhNrodo3;
    }

    /**
     * @param string|null $vtmclhNrodo3
     * @return Vtmclh
     */
    public function setVtmclhNrodo3(?string $vtmclhNrodo3): Vtmclh
    {
        $this->vtmclhNrodo3 = $vtmclhNrodo3;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTipdo4(): ?string
    {
        return $this->vtmclhTipdo4;
    }

    /**
     * @param string|null $vtmclhTipdo4
     * @return Vtmclh
     */
    public function setVtmclhTipdo4(?string $vtmclhTipdo4): Vtmclh
    {
        $this->vtmclhTipdo4 = $vtmclhTipdo4;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNrodo4(): ?string
    {
        return $this->vtmclhNrodo4;
    }

    /**
     * @param string|null $vtmclhNrodo4
     * @return Vtmclh
     */
    public function setVtmclhNrodo4(?string $vtmclhNrodo4): Vtmclh
    {
        $this->vtmclhNrodo4 = $vtmclhNrodo4;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTipdo5(): ?string
    {
        return $this->vtmclhTipdo5;
    }

    /**
     * @param string|null $vtmclhTipdo5
     * @return Vtmclh
     */
    public function setVtmclhTipdo5(?string $vtmclhTipdo5): Vtmclh
    {
        $this->vtmclhTipdo5 = $vtmclhTipdo5;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNrodo5(): ?string
    {
        return $this->vtmclhNrodo5;
    }

    /**
     * @param string|null $vtmclhNrodo5
     * @return Vtmclh
     */
    public function setVtmclhNrodo5(?string $vtmclhNrodo5): Vtmclh
    {
        $this->vtmclhNrodo5 = $vtmclhNrodo5;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDireml(): ?string
    {
        return $this->vtmclhDireml;
    }

    /**
     * @param string|null $vtmclhDireml
     * @return Vtmclh
     */
    public function setVtmclhDireml(?string $vtmclhDireml): Vtmclh
    {
        $this->vtmclhDireml = $vtmclhDireml;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhSegpro(): ?string
    {
        return $this->vtmclhSegpro;
    }

    /**
     * @param string|null $vtmclhSegpro
     * @return Vtmclh
     */
    public function setVtmclhSegpro(?string $vtmclhSegpro): Vtmclh
    {
        $this->vtmclhSegpro = $vtmclhSegpro;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhContad(): ?string
    {
        return $this->vtmclhContad;
    }

    /**
     * @param string|null $vtmclhContad
     * @return Vtmclh
     */
    public function setVtmclhContad(?string $vtmclhContad): Vtmclh
    {
        $this->vtmclhContad = $vtmclhContad;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhEdisub(): ?string
    {
        return $this->vtmclhEdisub;
    }

    /**
     * @param string|null $vtmclhEdisub
     * @return Vtmclh
     */
    public function setVtmclhEdisub(?string $vtmclhEdisub): Vtmclh
    {
        $this->vtmclhEdisub = $vtmclhEdisub;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCuenta(): ?string
    {
        return $this->vtmclhCuenta;
    }

    /**
     * @param string|null $vtmclhCuenta
     * @return Vtmclh
     */
    public function setVtmclhCuenta(?string $vtmclhCuenta): Vtmclh
    {
        $this->vtmclhCuenta = $vtmclhCuenta;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVtmclhMaxitm(): ?int
    {
        return $this->vtmclhMaxitm;
    }

    /**
     * @param int|null $vtmclhMaxitm
     * @return Vtmclh
     */
    public function setVtmclhMaxitm(?int $vtmclhMaxitm): Vtmclh
    {
        $this->vtmclhMaxitm = $vtmclhMaxitm;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVtmclhDifdia(): ?int
    {
        return $this->vtmclhDifdia;
    }

    /**
     * @param int|null $vtmclhDifdia
     * @return Vtmclh
     */
    public function setVtmclhDifdia(?int $vtmclhDifdia): Vtmclh
    {
        $this->vtmclhDifdia = $vtmclhDifdia;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhPerina(): ?string
    {
        return $this->vtmclhPerina;
    }

    /**
     * @param string|null $vtmclhPerina
     * @return Vtmclh
     */
    public function setVtmclhPerina(?string $vtmclhPerina): Vtmclh
    {
        $this->vtmclhPerina = $vtmclhPerina;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhImpdif(): ?string
    {
        return $this->vtmclhImpdif;
    }

    /**
     * @param string|null $vtmclhImpdif
     * @return Vtmclh
     */
    public function setVtmclhImpdif(?string $vtmclhImpdif): Vtmclh
    {
        $this->vtmclhImpdif = $vtmclhImpdif;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhEmail(): ?string
    {
        return $this->vtmclhEmail;
    }

    /**
     * @param string|null $vtmclhEmail
     * @return Vtmclh
     */
    public function setVtmclhEmail(?string $vtmclhEmail): Vtmclh
    {
        $this->vtmclhEmail = $vtmclhEmail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCndint(): ?string
    {
        return $this->vtmclhCndint;
    }

    /**
     * @param string|null $vtmclhCndint
     * @return Vtmclh
     */
    public function setVtmclhCndint(?string $vtmclhCndint): Vtmclh
    {
        $this->vtmclhCndint = $vtmclhCndint;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDistri(): ?string
    {
        return $this->vtmclhDistri;
    }

    /**
     * @param string|null $vtmclhDistri
     * @return Vtmclh
     */
    public function setVtmclhDistri(?string $vtmclhDistri): Vtmclh
    {
        $this->vtmclhDistri = $vtmclhDistri;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDeposi(): ?string
    {
        return $this->vtmclhDeposi;
    }

    /**
     * @param string|null $vtmclhDeposi
     * @return Vtmclh
     */
    public function setVtmclhDeposi(?string $vtmclhDeposi): Vtmclh
    {
        $this->vtmclhDeposi = $vtmclhDeposi;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhSector(): ?string
    {
        return $this->vtmclhSector;
    }

    /**
     * @param string|null $vtmclhSector
     * @return Vtmclh
     */
    public function setVtmclhSector(?string $vtmclhSector): Vtmclh
    {
        $this->vtmclhSector = $vtmclhSector;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNrodis(): ?string
    {
        return $this->vtmclhNrodis;
    }

    /**
     * @param string|null $vtmclhNrodis
     * @return Vtmclh
     */
    public function setVtmclhNrodis(?string $vtmclhNrodis): Vtmclh
    {
        $this->vtmclhNrodis = $vtmclhNrodis;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhOleole(): ?string
    {
        return $this->vtmclhOleole;
    }

    /**
     * @param string|null $vtmclhOleole
     * @return Vtmclh
     */
    public function setVtmclhOleole(?string $vtmclhOleole): Vtmclh
    {
        $this->vtmclhOleole = $vtmclhOleole;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhBmpbmp(): ?string
    {
        return $this->vtmclhBmpbmp;
    }

    /**
     * @param string|null $vtmclhBmpbmp
     * @return Vtmclh
     */
    public function setVtmclhBmpbmp(?string $vtmclhBmpbmp): Vtmclh
    {
        $this->vtmclhBmpbmp = $vtmclhBmpbmp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhInhibe(): ?string
    {
        return $this->vtmclhInhibe;
    }

    /**
     * @param string|null $vtmclhInhibe
     * @return Vtmclh
     */
    public function setVtmclhInhibe(?string $vtmclhInhibe): Vtmclh
    {
        $this->vtmclhInhibe = $vtmclhInhibe;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhPrmxpr(): ?string
    {
        return $this->vtmclhPrmxpr;
    }

    /**
     * @param string|null $vtmclhPrmxpr
     * @return Vtmclh
     */
    public function setVtmclhPrmxpr(?string $vtmclhPrmxpr): Vtmclh
    {
        $this->vtmclhPrmxpr = $vtmclhPrmxpr;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhPrmipr(): ?string
    {
        return $this->vtmclhPrmipr;
    }

    /**
     * @param string|null $vtmclhPrmipr
     * @return Vtmclh
     */
    public function setVtmclhPrmipr(?string $vtmclhPrmipr): Vtmclh
    {
        $this->vtmclhPrmipr = $vtmclhPrmipr;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTrafcr(): ?string
    {
        return $this->vtmclhTrafcr;
    }

    /**
     * @param string|null $vtmclhTrafcr
     * @return Vtmclh
     */
    public function setVtmclhTrafcr(?string $vtmclhTrafcr): Vtmclh
    {
        $this->vtmclhTrafcr = $vtmclhTrafcr;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCodcof(): ?string
    {
        return $this->vtmclhCodcof;
    }

    /**
     * @param string|null $vtmclhCodcof
     * @return Vtmclh
     */
    public function setVtmclhCodcof(?string $vtmclhCodcof): Vtmclh
    {
        $this->vtmclhCodcof = $vtmclhCodcof;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhModcpt(): ?string
    {
        return $this->vtmclhModcpt;
    }

    /**
     * @param string|null $vtmclhModcpt
     * @return Vtmclh
     */
    public function setVtmclhModcpt(?string $vtmclhModcpt): Vtmclh
    {
        $this->vtmclhModcpt = $vtmclhModcpt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTipcpt(): ?string
    {
        return $this->vtmclhTipcpt;
    }

    /**
     * @param string|null $vtmclhTipcpt
     * @return Vtmclh
     */
    public function setVtmclhTipcpt(?string $vtmclhTipcpt): Vtmclh
    {
        $this->vtmclhTipcpt = $vtmclhTipcpt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCodcpt(): ?string
    {
        return $this->vtmclhCodcpt;
    }

    /**
     * @param string|null $vtmclhCodcpt
     * @return Vtmclh
     */
    public function setVtmclhCodcpt(?string $vtmclhCodcpt): Vtmclh
    {
        $this->vtmclhCodcpt = $vtmclhCodcpt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhLiscli(): ?string
    {
        return $this->vtmclhLiscli;
    }

    /**
     * @param string|null $vtmclhLiscli
     * @return Vtmclh
     */
    public function setVtmclhLiscli(?string $vtmclhLiscli): Vtmclh
    {
        $this->vtmclhLiscli = $vtmclhLiscli;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTipopr(): ?string
    {
        return $this->vtmclhTipopr;
    }

    /**
     * @param string|null $vtmclhTipopr
     * @return Vtmclh
     */
    public function setVtmclhTipopr(?string $vtmclhTipopr): Vtmclh
    {
        $this->vtmclhTipopr = $vtmclhTipopr;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCodopr(): ?string
    {
        return $this->vtmclhCodopr;
    }

    /**
     * @param string|null $vtmclhCodopr
     * @return Vtmclh
     */
    public function setVtmclhCodopr(?string $vtmclhCodopr): Vtmclh
    {
        $this->vtmclhCodopr = $vtmclhCodopr;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhModpag(): ?string
    {
        return $this->vtmclhModpag;
    }

    /**
     * @param string|null $vtmclhModpag
     * @return Vtmclh
     */
    public function setVtmclhModpag(?string $vtmclhModpag): Vtmclh
    {
        $this->vtmclhModpag = $vtmclhModpag;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhTippag(): ?string
    {
        return $this->vtmclhTippag;
    }

    /**
     * @param string|null $vtmclhTippag
     * @return Vtmclh
     */
    public function setVtmclhTippag(?string $vtmclhTippag): Vtmclh
    {
        $this->vtmclhTippag = $vtmclhTippag;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhMedpag(): ?string
    {
        return $this->vtmclhMedpag;
    }

    /**
     * @param string|null $vtmclhMedpag
     * @return Vtmclh
     */
    public function setVtmclhMedpag(?string $vtmclhMedpag): Vtmclh
    {
        $this->vtmclhMedpag = $vtmclhMedpag;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhLanexp(): ?string
    {
        return $this->vtmclhLanexp;
    }

    /**
     * @param string|null $vtmclhLanexp
     * @return Vtmclh
     */
    public function setVtmclhLanexp(?string $vtmclhLanexp): Vtmclh
    {
        $this->vtmclhLanexp = $vtmclhLanexp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhGenxml(): ?string
    {
        return $this->vtmclhGenxml;
    }

    /**
     * @param string|null $vtmclhGenxml
     * @return Vtmclh
     */
    public function setVtmclhGenxml(?string $vtmclhGenxml): Vtmclh
    {
        $this->vtmclhGenxml = $vtmclhGenxml;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhGlndes(): ?string
    {
        return $this->vtmclhGlndes;
    }

    /**
     * @param string|null $vtmclhGlndes
     * @return Vtmclh
     */
    public function setVtmclhGlndes(?string $vtmclhGlndes): Vtmclh
    {
        $this->vtmclhGlndes = $vtmclhGlndes;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCodexp(): ?string
    {
        return $this->vtmclhCodexp;
    }

    /**
     * @param string|null $vtmclhCodexp
     * @return Vtmclh
     */
    public function setVtmclhCodexp(?string $vtmclhCodexp): Vtmclh
    {
        $this->vtmclhCodexp = $vtmclhCodexp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhOblcon(): ?string
    {
        return $this->vtmclhOblcon;
    }

    /**
     * @param string|null $vtmclhOblcon
     * @return Vtmclh
     */
    public function setVtmclhOblcon(?string $vtmclhOblcon): Vtmclh
    {
        $this->vtmclhOblcon = $vtmclhOblcon;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDeptra(): ?string
    {
        return $this->vtmclhDeptra;
    }

    /**
     * @param string|null $vtmclhDeptra
     * @return Vtmclh
     */
    public function setVtmclhDeptra(?string $vtmclhDeptra): Vtmclh
    {
        $this->vtmclhDeptra = $vtmclhDeptra;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhSectra(): ?string
    {
        return $this->vtmclhSectra;
    }

    /**
     * @param string|null $vtmclhSectra
     * @return Vtmclh
     */
    public function setVtmclhSectra(?string $vtmclhSectra): Vtmclh
    {
        $this->vtmclhSectra = $vtmclhSectra;
        return $this;
    }

    /**
     * @return string
     */
    public function getVtmclhFisjur(): string
    {
        return $this->vtmclhFisjur;
    }

    /**
     * @param string $vtmclhFisjur
     * @return Vtmclh
     */
    public function setVtmclhFisjur(string $vtmclhFisjur): Vtmclh
    {
        $this->vtmclhFisjur = $vtmclhFisjur;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhApell1(): ?string
    {
        return $this->vtmclhApell1;
    }

    /**
     * @param string|null $vtmclhApell1
     * @return Vtmclh
     */
    public function setVtmclhApell1(?string $vtmclhApell1): Vtmclh
    {
        $this->vtmclhApell1 = $vtmclhApell1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhApell2(): ?string
    {
        return $this->vtmclhApell2;
    }

    /**
     * @param string|null $vtmclhApell2
     * @return Vtmclh
     */
    public function setVtmclhApell2(?string $vtmclhApell2): Vtmclh
    {
        $this->vtmclhApell2 = $vtmclhApell2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNomb01(): ?string
    {
        return $this->vtmclhNomb01;
    }

    /**
     * @param string|null $vtmclhNomb01
     * @return Vtmclh
     */
    public function setVtmclhNomb01(?string $vtmclhNomb01): Vtmclh
    {
        $this->vtmclhNomb01 = $vtmclhNomb01;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhNomb02(): ?string
    {
        return $this->vtmclhNomb02;
    }

    /**
     * @param string|null $vtmclhNomb02
     * @return Vtmclh
     */
    public function setVtmclhNomb02(?string $vtmclhNomb02): Vtmclh
    {
        $this->vtmclhNomb02 = $vtmclhNomb02;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsrVtmclhLocpro(): ?string
    {
        return $this->usrVtmclhLocpro;
    }

    /**
     * @param string|null $usrVtmclhLocpro
     * @return Vtmclh
     */
    public function setUsrVtmclhLocpro(?string $usrVtmclhLocpro): Vtmclh
    {
        $this->usrVtmclhLocpro = $usrVtmclhLocpro;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsrVtmclhCodare(): ?string
    {
        return $this->usrVtmclhCodare;
    }

    /**
     * @param string|null $usrVtmclhCodare
     * @return Vtmclh
     */
    public function setUsrVtmclhCodare(?string $usrVtmclhCodare): Vtmclh
    {
        $this->usrVtmclhCodare = $usrVtmclhCodare;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsrVtmclhTienda(): ?string
    {
        return $this->usrVtmclhTienda;
    }

    /**
     * @param string|null $usrVtmclhTienda
     * @return Vtmclh
     */
    public function setUsrVtmclhTienda(?string $usrVtmclhTienda): Vtmclh
    {
        $this->usrVtmclhTienda = $usrVtmclhTienda;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsrVtmclhDepo(): ?string
    {
        return $this->usrVtmclhDepo;
    }

    /**
     * @param string|null $usrVtmclhDepo
     * @return Vtmclh
     */
    public function setUsrVtmclhDepo(?string $usrVtmclhDepo): Vtmclh
    {
        $this->usrVtmclhDepo = $usrVtmclhDepo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsrVtmclhGrptan(): ?string
    {
        return $this->usrVtmclhGrptan;
    }

    /**
     * @param string|null $usrVtmclhGrptan
     * @return Vtmclh
     */
    public function setUsrVtmclhGrptan(?string $usrVtmclhGrptan): Vtmclh
    {
        $this->usrVtmclhGrptan = $usrVtmclhGrptan;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsrVtmclhRefcli(): ?string
    {
        return $this->usrVtmclhRefcli;
    }

    /**
     * @param string|null $usrVtmclhRefcli
     * @return Vtmclh
     */
    public function setUsrVtmclhRefcli(?string $usrVtmclhRefcli): Vtmclh
    {
        $this->usrVtmclhRefcli = $usrVtmclhRefcli;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsrVtmclhCodemp(): ?string
    {
        return $this->usrVtmclhCodemp;
    }

    /**
     * @param string|null $usrVtmclhCodemp
     * @return Vtmclh
     */
    public function setUsrVtmclhCodemp(?string $usrVtmclhCodemp): Vtmclh
    {
        $this->usrVtmclhCodemp = $usrVtmclhCodemp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsrVtmclhRefloc(): ?string
    {
        return $this->usrVtmclhRefloc;
    }

    /**
     * @param string|null $usrVtmclhRefloc
     * @return Vtmclh
     */
    public function setUsrVtmclhRefloc(?string $usrVtmclhRefloc): Vtmclh
    {
        $this->usrVtmclhRefloc = $usrVtmclhRefloc;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsrVtmclhEstcom(): ?string
    {
        return $this->usrVtmclhEstcom;
    }

    /**
     * @param string|null $usrVtmclhEstcom
     * @return Vtmclh
     */
    public function setUsrVtmclhEstcom(?string $usrVtmclhEstcom): Vtmclh
    {
        $this->usrVtmclhEstcom = $usrVtmclhEstcom;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhUserid(): ?string
    {
        return $this->vtmclhUserid;
    }

    /**
     * @param string|null $vtmclhUserid
     * @return Vtmclh
     */
    public function setVtmclhUserid(?string $vtmclhUserid): Vtmclh
    {
        $this->vtmclhUserid = $vtmclhUserid;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhUltopr(): ?string
    {
        return $this->vtmclhUltopr;
    }

    /**
     * @param string|null $vtmclhUltopr
     * @return Vtmclh
     */
    public function setVtmclhUltopr(?string $vtmclhUltopr): Vtmclh
    {
        $this->vtmclhUltopr = $vtmclhUltopr;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhDebaja(): ?string
    {
        return $this->vtmclhDebaja;
    }

    /**
     * @param string|null $vtmclhDebaja
     * @return Vtmclh
     */
    public function setVtmclhDebaja(?string $vtmclhDebaja): Vtmclh
    {
        $this->vtmclhDebaja = $vtmclhDebaja;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhHormov(): ?string
    {
        return $this->vtmclhHormov;
    }

    /**
     * @param string|null $vtmclhHormov
     * @return Vtmclh
     */
    public function setVtmclhHormov(?string $vtmclhHormov): Vtmclh
    {
        $this->vtmclhHormov = $vtmclhHormov;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhModule(): ?string
    {
        return $this->vtmclhModule;
    }

    /**
     * @param string|null $vtmclhModule
     * @return Vtmclh
     */
    public function setVtmclhModule(?string $vtmclhModule): Vtmclh
    {
        $this->vtmclhModule = $vtmclhModule;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhOalias(): ?string
    {
        return $this->vtmclhOalias;
    }

    /**
     * @param string|null $vtmclhOalias
     * @return Vtmclh
     */
    public function setVtmclhOalias(?string $vtmclhOalias): Vtmclh
    {
        $this->vtmclhOalias = $vtmclhOalias;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhLottra(): ?string
    {
        return $this->vtmclhLottra;
    }

    /**
     * @param string|null $vtmclhLottra
     * @return Vtmclh
     */
    public function setVtmclhLottra(?string $vtmclhLottra): Vtmclh
    {
        $this->vtmclhLottra = $vtmclhLottra;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhLotrec(): ?string
    {
        return $this->vtmclhLotrec;
    }

    /**
     * @param string|null $vtmclhLotrec
     * @return Vtmclh
     */
    public function setVtmclhLotrec(?string $vtmclhLotrec): Vtmclh
    {
        $this->vtmclhLotrec = $vtmclhLotrec;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhLotori(): ?string
    {
        return $this->vtmclhLotori;
    }

    /**
     * @param string|null $vtmclhLotori
     * @return Vtmclh
     */
    public function setVtmclhLotori(?string $vtmclhLotori): Vtmclh
    {
        $this->vtmclhLotori = $vtmclhLotori;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhSysver(): ?string
    {
        return $this->vtmclhSysver;
    }

    /**
     * @param string|null $vtmclhSysver
     * @return Vtmclh
     */
    public function setVtmclhSysver(?string $vtmclhSysver): Vtmclh
    {
        $this->vtmclhSysver = $vtmclhSysver;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVtmclhCmpver(): ?string
    {
        return $this->vtmclhCmpver;
    }

    /**
     * @param string|null $vtmclhCmpver
     * @return Vtmclh
     */
    public function setVtmclhCmpver(?string $vtmclhCmpver): Vtmclh
    {
        $this->vtmclhCmpver = $vtmclhCmpver;
        return $this;
    }


    public function getId(): ?string
    {
        return $this->getVtmclhNrocta();
    }
}
