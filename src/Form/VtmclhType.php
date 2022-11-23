<?php

namespace App\Form;

use App\Entity\Vtmclh;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VtmclhType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('vtmclhRubr01')
            ->add('vtmclhRubr03')
            ->add('vtmclhRubr04')
            ->add('vtmclhRubr05')
            ->add('vtmclhRubr06')
            ->add('vtmclhRubr07')
            ->add('vtmclhRubr08')
            ->add('vtmclhRubr09')
            ->add('vtmclhRubr10')
            ->add('vtmclhRubr02')
            ->add('vtmclhNombre')
            ->add('vtmclhNrosub')
            ->add('vtmclhRespon')
            ->add('vtmclhDirecc')
            ->add('vtmclhNumero')
            ->add('vtmclhDppiso')
            ->add('vtmclhDeptos')
            ->add('vtmclhCodfil')
            ->add('vtmclhCodpai')
            ->add('vtmclhCodpos')
            ->add('vtmclhMunicp')
            ->add('vtmclhFletes')
            ->add('vtmclhTelefn')
            ->add('vtmclhNrofax')
            ->add('vtmclhNtelex')
            ->add('vtmclhCndiva')
            ->add('vtmclhTipdoc')
            ->add('vtmclhNrodoc')
            ->add('vtmclhVnddor')
            ->add('vtmclhCobrad')
            ->add('vtmclhJurisd')
            ->add('vtmclhCodzon')
            ->add('vtmclhActivd')
            ->add('vtmclhCatego')
            ->add('vtmclhCndpag')
            ->add('vtmclhCndpre')
            ->add('vtmclhCodcrd')
            ->add('vtmclhGrubon')
            ->add('vtmclhCamion')
            ->add('vtmclhCamalt')
            ->add('vtmclhTracod')
            ->add('vtmclhDirep1')
            ->add('vtmclhDirep2')
            ->add('vtmclhDirep3')
            ->add('vtmclhDirep4')
            ->add('vtmclhDirep5')
            ->add('vtmclhHorrec')
            ->add('vtmclhDirent')
            ->add('vtmclhPaient')
            ->add('vtmclhCodent')
            ->add('vtmclhJurent')
            ->add('vtmclhZonent')
            ->add('vtmclhCopivt')
            ->add('vtmclhCopifc')
            ->add('vtmclhCopist')
            ->add('vtmclhTextos')
            ->add('vtmclhTipdo1')
            ->add('vtmclhNrodo1')
            ->add('vtmclhTipdo2')
            ->add('vtmclhNrodo2')
            ->add('vtmclhTipdo3')
            ->add('vtmclhNrodo3')
            ->add('vtmclhTipdo4')
            ->add('vtmclhNrodo4')
            ->add('vtmclhTipdo5')
            ->add('vtmclhNrodo5')
            ->add('vtmclhDireml')
            ->add('vtmclhSegpro')
            ->add('vtmclhContad')
            ->add('vtmclhEdisub')
            ->add('vtmclhCuenta')
            ->add('vtmclhMaxitm')
            ->add('vtmclhDifdia')
            ->add('vtmclhDifdes')
            ->add('vtmclhDifhas')
            ->add('vtmclhPerina')
            ->add('vtmclhImpdif')
            ->add('vtmclhEmail')
            ->add('vtmclhCndint')
            ->add('vtmclhDistri')
            ->add('vtmclhDeposi')
            ->add('vtmclhSector')
            ->add('vtmclhNrodis')
            ->add('vtmclhOleole')
            ->add('vtmclhBmpbmp')
            ->add('vtmclhInhibe')
            ->add('vtmclhPrmxpr')
            ->add('vtmclhPrmipr')
            ->add('vtmclhTrafcr')
            ->add('vtmclhCodcof')
            ->add('vtmclhModcpt')
            ->add('vtmclhTipcpt')
            ->add('vtmclhCodcpt')
            ->add('vtmclhLiscli')
            ->add('vtmclhTipopr')
            ->add('vtmclhCodopr')
            ->add('vtmclhModpag')
            ->add('vtmclhTippag')
            ->add('vtmclhMedpag')
            ->add('vtmclhLanexp')
            ->add('vtmclhGenxml')
            ->add('vtmclhGlndes')
            ->add('vtmclhCodexp')
            ->add('vtmclhOblcon')
            ->add('vtmclhDeptra')
            ->add('vtmclhSectra')
            ->add('vtmclhFisjur')
            ->add('vtmclhApell1')
            ->add('vtmclhApell2')
            ->add('vtmclhNomb01')
            ->add('vtmclhNomb02')
            ->add('usrVtmclhLocpro')
            ->add('usrVtmclhCodare')
            ->add('usrVtmclhTienda')
            ->add('usrVtmclhDepo')
            ->add('usrVtmclhGrptan')
            ->add('usrVtmclhRefcli')
            ->add('usrVtmclhCodemp')
            ->add('usrVtmclhRefloc')
            ->add('usrVtmclhEstcom')
            ->add('vtmclhFecalt')
            ->add('vtmclhFecmod')
            ->add('vtmclhUserid')
            ->add('vtmclhUltopr')
            ->add('vtmclhDebaja')
            ->add('vtmclhHormov')
            ->add('vtmclhModule')
            ->add('vtmclhOalias')
            ->add('vtmclhTstamp')
            ->add('vtmclhLottra')
            ->add('vtmclhLotrec')
            ->add('vtmclhLotori')
            ->add('vtmclhSysver')
            ->add('vtmclhCmpver')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vtmclh::class,
        ]);
    }
}
